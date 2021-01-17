<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Foto</th>
                <th colspan="3">Ação</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td><img src="{{ $user->image }}" class="img-responsive" width="30" height="30"></td>
                <td>

                    <div class='btn-group'>
                        <a href="{{ route('users.show', [$user->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('users.edit', [$user->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>

                    </div>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
