<table class="table table-responsive" id="zbinfos-table">
    <thead>
        <th>A1</th>
        <th>A2</th>
        <th>A3</th>
        <th>Aemail</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($zbinfos as $zbinfo)
        <tr>
            <td>{!! $zbinfo->a1 !!}</td>
            <td>{!! $zbinfo->a2 !!}</td>
            <td>{!! $zbinfo->a3 !!}</td>
            <td>{!! $zbinfo->aemail !!}</td>
            <td>
                {!! Form::open(['route' => ['zbinfos.destroy', $zbinfo->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('zbinfos.show', [$zbinfo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('zbinfos.edit', [$zbinfo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>