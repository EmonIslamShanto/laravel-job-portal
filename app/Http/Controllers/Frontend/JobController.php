<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\JobCreateRequest;
use App\Models\Benefits;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Job;
use App\Models\JobBenefits;
use App\Models\JobCategory;
use App\Models\JobRole;
use App\Models\JobSkills;
use App\Models\JobTag;
use App\Models\JobType;
use App\Models\SalaryType;
use App\Models\Skill;
use App\Models\State;
use App\Models\Tag;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Mockery\Matcher\Not;

class JobController extends Controller
{
    use Searchable;
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        storePlanInformation();

        $query = Job::query();

        $this->search($query, ['title', 'slug']);

        $jobs = $query->where('company_id', auth()->user()->company->id)->orderBy('id', 'DESC')->paginate(10);

        return view('front-end.company-dashboard.job.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|RedirectResponse
    {
        storePlanInformation();
        $userPlan = session('user_plan');
        if ($userPlan->job_limit < 1) {
            Notify::errorNotification('You have reached your job limit. Please upgrade your plan to post more jobs.');
            return to_route('company.jobs.index');
        }

        $companies = Company::where(['profile_completion' => 1, 'visibility' => 1])->get();
        $categories = JobCategory::all();
        $countries = Country::all();
        $salaryTypes = SalaryType::all();
        $experiences = Experience::all();
        $jobRoles = JobRole::all();
        $educations = Education::all();
        $jobTypes = JobType::all();
        $tags = Tag::all();
        $skills = Skill::all();
        return view('front-end.company-dashboard.job.create', compact('companies', 'categories', 'countries', 'experiences', 'salaryTypes', 'jobRoles', 'educations', 'jobTypes', 'tags', 'skills'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobCreateRequest $request): RedirectResponse
    {



        $job = new Job();
        $job->title = $request->title;
        $job->company_id = auth()->user()->company->id;
        $job->job_category_id = $request->category;
        $job->vacancies = $request->vacancies;
        $job->deadline = $request->deadline;

        $job->country_id = $request->country;
        $job->state_id = $request->state;
        $job->city_id = $request->city;
        $job->address = $request->address;

        $job->salary_mode = $request->salary_mode;
        if ($request->salary_mode === 'range') {
            $job->min_salary = $request->min_salary;
            $job->max_salary = $request->max_salary;
        } elseif ($request->salary_mode === 'custom') {
            $job->custom_salary = $request->custom_salary;
        }
        $job->salary_type_id = $request->salary_type;

        $job->job_experience_id = $request->experience;
        $job->education_id = $request->education;
        $job->job_type_id = $request->job_type;
        $job->job_role_id = $request->job_role;

        $job->apply_on = $request->receive_application;

        $job->featured = $request->has('featured') ? $request->input('featured') : 0;
        $job->highlight = $request->has('highlight') ? $request->input('highlight') : 0;

        $job->description = $request->description;

        if ($request->featured == 1) {
            if (session('user_plan')->featured_job_limit < 1) {
                Notify::errorNotification('You have reached your featured job limit. Please upgrade your plan to post more featured jobs.');
                return redirect()->back();
            }
        }

        if ($request->highlight == 1) {
            if (session('user_plan')->highlight_job_limit < 1) {
                Notify::errorNotification('You have reached your highlight job limit. Please upgrade your plan to post more highlight jobs.');
                return redirect()->back();
            }
        }

        $job->save();

        //INSERT TAGS
        foreach ($request->tags as $tag) {
            $createTag = new JobTag();
            $createTag->job_id = $job->id;
            $createTag->tag_id = $tag;
            $createTag->save();
        }

        //INSERT BENEFITS
        $benefits = explode(',', $request->benefits);

        foreach ($benefits as $benefit) {
            $createBenefit = new Benefits();
            $createBenefit->company_id = $job->company_id;
            $createBenefit->name = $benefit;
            $createBenefit->save();

            $jobBenefit = new JobBenefits();
            $jobBenefit->job_id = $job->id;
            $jobBenefit->benefit_id = $createBenefit->id;
            $jobBenefit->save();
        }

        //INSERT SKILLS
        foreach ($request->skills as $skill) {
            $jobSkill = new JobSkills();
            $jobSkill->job_id = $job->id;
            $jobSkill->skill_id = $skill;
            $jobSkill->save();
        }

        if ($job) {
            $userPlan = auth()->user()->company->userPlan;
            $userPlan->job_limit = $userPlan->job_limit - 1;
            if ($job->featured == 1) {
                $userPlan->featured_job_limit = $userPlan->featured_job_limit - 1;
            }
            if ($job->highlight == 1) {
                $userPlan->highlight_job_limit = $userPlan->highlight_job_limit - 1;
            }
            $userPlan->save();
            storePlanInformation();
        }

        Notify::createdNotification();

        return to_route('company.jobs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $job = Job::findOrFail($id);
        abort_if($job->company_id !== auth()->user()->company->id, 403);
        $companies = Company::where(['profile_completion' => 1, 'visibility' => 1])->get();
        $categories = JobCategory::all();
        $countries = Country::all();
        $states = State::where('country_id', $job?->country_id)->get();
        $cities = City::where('state_id', $job?->state_id)->get();
        $salaryTypes = SalaryType::all();
        $experiences = Experience::all();
        $jobRoles = JobRole::all();
        $educations = Education::all();
        $jobTypes = JobType::all();
        $tags = Tag::all();
        $skills = Skill::all();
        return view('front-end.company-dashboard.job.edit', compact('companies', 'categories', 'countries', 'states', 'cities', 'experiences', 'salaryTypes', 'jobRoles', 'educations', 'jobTypes', 'tags', 'skills', 'job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobCreateRequest $request, string $id): RedirectResponse
    {
        $job = Job::findOrFail($id);
        $job->title = $request->title;
        $job->job_category_id = $request->category;
        $job->vacancies = $request->vacancies;
        $job->deadline = $request->deadline;

        $job->country_id = $request->country;
        $job->state_id = $request->state;
        $job->city_id = $request->city;
        $job->address = $request->address;

        $job->salary_mode = $request->salary_mode;
        if ($request->salary_mode === 'range') {
            $job->min_salary = $request->min_salary;
            $job->max_salary = $request->max_salary;
        } elseif ($request->salary_mode === 'custom') {
            $job->custom_salary = $request->custom_salary;
        }
        $job->salary_type_id = $request->salary_type;

        $job->job_experience_id = $request->experience;
        $job->education_id = $request->education;
        $job->job_type_id = $request->job_type;
        $job->job_role_id = $request->job_role;

        $job->apply_on = $request->receive_application;

        $job->featured = $request->has('featured') ? $request->input('featured') : 0;
        $job->highlight = $request->has('highlight') ? $request->input('highlight') : 0;

        $job->description = $request->description;

        $job->save();

        //INSERT TAGS
        JobTag::where('job_id', $id)->delete();
        foreach ($request->tags as $tag) {
            $createTag = new JobTag();
            $createTag->job_id = $job->id;
            $createTag->tag_id = $tag;
            $createTag->save();
        }

        //INSERT BENEFITS
        $selectedBenefits = JobBenefits::where('job_id', $id);
        foreach ($selectedBenefits->get() as $selectedBenefit) {
            Benefits::find($selectedBenefit->benefit_id)->delete();
        }
        $selectedBenefits->delete();

        $benefits = explode(',', $request->benefits);

        foreach ($benefits as $benefit) {
            $createBenefit = new Benefits();
            $createBenefit->company_id = $job->company_id;
            $createBenefit->name = $benefit;
            $createBenefit->save();

            $jobBenefit = new JobBenefits();
            $jobBenefit->job_id = $job->id;
            $jobBenefit->benefit_id = $createBenefit->id;
            $jobBenefit->save();
        }

        //INSERT SKILLS
        JobSkills::where('job_id', $id)->delete();
        foreach ($request->skills as $skill) {
            $jobSkill = new JobSkills();
            $jobSkill->job_id = $job->id;
            $jobSkill->skill_id = $skill;
            $jobSkill->save();
        }

        Notify::updatedNotification();

        return to_route('company.jobs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        try {
            Job::findOrFail($id)->delete();

            Notify::deletedNotification();
            return response(['massage' => 'success'], 200);
        } catch (\Exception $e) {
            logger($e);
            return response(['massage' => 'Something went wrong! Please, try again.'], 500);
        }
    }

    
}
