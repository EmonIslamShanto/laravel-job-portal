<div class="tab-pane fade" id="pills-experience" role="tabpanel" aria-labelledby="pills-experience-tab" tabindex="0">
<div class="d-flex justify-content-between">
    <h4>Experience</h4>
    <button class="btn btn-primary" onclick="$('#experienceForm').trigger('reset'); editId = ''; editMode=false" data-bs-toggle="modal" data-bs-target="#experienceModal">Add Experience</button>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Company</th>
            <th>Department</th>
            <th>Designation</th>
            <th>Period</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="experience-tbody">
        @foreach ($candidateExperiences as $candidateExperience)
            <tr>
                <td>{{ $candidateExperience->company }}</td>
                <td>{{ $candidateExperience->department }}</td>
                <td>{{ $candidateExperience->designation }}</td>
                <td>{{ $candidateExperience->start_date }} To {{ $candidateExperience->currently_working === 1 ? 'Present': $candidateExperience->end_date }}</td>
                <td>
                    <a href="{{ route('candidate.experience.edit', $candidateExperience->id) }}" class="btn btn-primary edit-experience" data-bs-toggle="modal" data-bs-target="#experienceModal"><i class="fas fa-edit"></i> Edit</a>
                    <a href="{{ route('candidate.experience.destroy', $candidateExperience->id) }}" class="btn btn-danger delete-experience"><i class="fas fa-trash-alt"></i> Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
