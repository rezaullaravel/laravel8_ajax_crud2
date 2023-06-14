<table class="table table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($students as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <th>
                <button type="button" class="btn btn-success updateForm"
                data-id={{ $student->id }}
                data-name={{ $student->name }}
                data-email={{ $student->email }}
                >Edit</button>
                <a href="" class="btn btn-danger delete_student"
                data-id={{ $student->id }}
                >Delete</a>
            </th>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $students->links() }}
