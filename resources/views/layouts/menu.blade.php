<li class="{{ Request::is('staff*') ? 'active' : '' }}">
    <a href="{!! route('staff.index') !!}"><i class="fa fa-edit"></i><span>staff</span></a>
</li>

<li class="{{ Request::is('zbinfos*') ? 'active' : '' }}">
    <a href="{!! route('zbinfos.index') !!}"><i class="fa fa-edit"></i><span>zbinfos</span></a>
</li>

<li class="{{ Request::is('userInfos*') ? 'active' : '' }}">
    <a href="{!! route('userInfos.index') !!}"><i class="fa fa-edit"></i><span>userInfos</span></a>
</li>

