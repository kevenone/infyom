<table class="table table-responsive" id="staff-table">
    <thead>
        <th>Name</th>
        <th>Sex</th>
        <th>Phone</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($staff as $staff)
        <tr>
            <td>{!! $staff->name !!}</td>
            <td>{!! $staff->sex !!}</td>
            <td>{!! $staff->phone !!}</td>
            <td>
                {!! Form::open(['route' => ['staff.destroy', $staff->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('staff.show', [$staff->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('staff.edit', [$staff->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>