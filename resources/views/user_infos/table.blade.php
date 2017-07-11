<table class="table table-responsive" id="userInfos-table">
    <thead>
        <th>Name</th>
        <th>Phonr</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($userInfos as $userInfos)
        <tr>
            <td>{!! $userInfos->name !!}</td>
            <td>{!! $userInfos->phonr !!}</td>
            <td>
                {!! Form::open(['route' => ['userInfos.destroy', $userInfos->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('userInfos.show', [$userInfos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('userInfos.edit', [$userInfos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>