<div class="tab-pane fade" id="pills-experience" role="tabpanel" aria-labelledby="pills-experience-tab" tabindex="0">
    <div>
        <div class="d-flex justify-content-between">
            <h4>Experience</h4>
            <button class="btn btn-primary" onclick="$('#experienceForm').trigger('reset'); editId = ''; editMode=false"
                data-bs-toggle="modal" data-bs-target="#experienceModal">Add Experience</button>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Company</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Period</th>
                    <th style="width: 25%">Action</th>
                </tr>
            </thead>
            <tbody class="experience-tbody">
                @forelse ($candidateExperiences as $candidateExperience)
                    <tr>
                        <td>{{ $candidateExperience->company }}</td>
                        <td>{{ $candidateExperience->department }}</td>
                        <td>{{ $candidateExperience->designation }}</td>
                        <td>{{ $candidateExperience->start_date }} To
                            {{ $candidateExperience->currently_working === 1 ? 'Present' : $candidateExperience->end_date }}
                        </td>
                        <td>
                            <a href="{{ route('candidate.experience.edit', $candidateExperience->id) }}"
                                class="btn btn-primary edit-experience" data-bs-toggle="modal"
                                data-bs-target="#experienceModal"><i class="fas fa-edit"></i> Edit</a>
                            <a href="{{ route('candidate.experience.destroy', $candidateExperience->id) }}"
                                class="btn btn-danger delete-experience"><i class="fas fa-trash-alt"></i> Delete</a>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="5" class="text-center">No Experiencec Have Added Yet</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        <div class="d-flex justify-content-between">
            <h4>Education</h4>
            <button class="btn btn-primary" onclick="$('#educationForm').trigger('reset'); editId = ''; editMode=false"
                data-bs-toggle="modal" data-bs-target="#educationModal">Add Education</button>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Institute</th>
                    <th>Level</th>
                    <th>Degree</th>
                    <th>Year</th>
                    <th style="width: 25%">Action</th>
                </tr>
            </thead>
            <tbody class="education-tbody">
                @forelse ($candidateEducations as $candidateEducation)
                    <tr>
                        <td>{{ $candidateEducation->institute }}</td>
                        <td>{{ $candidateEducation->level }}</td>
                        <td>{{ $candidateEducation->degree }}</td>
                        <td>{{ $candidateEducation->year }}</td>
                        <td>
                            <a href="{{ route('candidate.education.edit', $candidateEducation->id) }}"
                                class="btn btn-primary edit-education" data-bs-toggle="modal"
                                data-bs-target="#educationModal"><i class="fas fa-edit"></i> Edit</a>
                            <a href="{{ route('candidate.education.destroy', $candidateEducation->id) }}"
                                class="btn btn-danger delete-education"><i class="fas fa-trash-alt"></i> Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No Education Have Added Yet</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
