<div class="sticky">
    <div class="horizontal-main hor-menu clearfix">
        <div class="horizontal-mainwrapper container clearfix">
            <!--Nav-->
            <nav class="horizontalMenu clearfix">
                <ul class="horizontalMenu-list">
                    @php
                        $routeName = Route::current()->uri();
                    @endphp
                    <li aria-haspopup="true">
                        <a href="{{url('/')}}" class="sub-icon {{$routeName==='dashboard' ? 'active' : NULL}}"><i class="fe fe-airplay"></i> Acceuil</a>
                    </li>
                    <li aria-haspopup="true">
                        <a href="#" class="sub-icon {{in_array($routeName, ['familles', 'sous-familles']) ? 'active' : NULL}}"><i  class="fe fe-grid"></i>Familles <i class="fa fa-angle-down horizontal-icon"></i></a>
                        <ul class="sub-menu">
                            <li aria-haspopup="true"><a href="{{url('/familles')}}" class="{{$routeName==='familles' ? 'active' : NULL}}"> Familles</a></li>
                            <li aria-haspopup="true"><a href="{{url('/sous-familles')}}" class="{{$routeName==='sous-familles' ? 'active' : NULL}}"> Sous Familles</a></li>
                        </ul>
                    </li>
                    <li aria-haspopup="true">
                        <a href="{{url('/articles')}}" class="sub-icon {{$routeName==='articles' ? 'active' : NULL}}"><i class="fe fe-layers"></i> Articles</a>
                    </li>
                    <li aria-haspopup="true">
                        <a href="{{url('/inventaires')}}" class="sub-icon {{$routeName==='inventaires' ? 'active' : NULL}}"><i class="fe fe-package"></i> Inventaires</a>
                    </li>
                    <li aria-haspopup="true">
                        <a href="{{url('/services')}}" class="sub-icon {{$routeName==='services' ? 'active' : NULL}}"><i class="fa fa-sitemap"></i> Services</a>
                    </li>
                    <li aria-haspopup="true">
                        <a href="{{url('/bon-affectation')}}" class="sub-icon {{$routeName==='bon-affectation' ? 'active' : NULL}}"><i class="fe fe-layout"></i> Bon d'affectation</a>
                    </li>
                    <li aria-haspopup="true">
                        <a href="{{url('dossiers')}}" class="sub-icon {{$routeName==='dossiers' ? 'active' : NULL}}"><i class="fe fe-server"></i> Dossiers</a>
                    </li>
                    <li aria-haspopup="true"><a href="{{url('users')}}" class="sub-icon {{$routeName==='users' ? 'active' : NULL}}">
                        <i class="fe fe-users"></i> Utilisateurs </a>
                    </li>
                    <li aria-haspopup="true">
                        <a href="#" class="sub-icon {{in_array($routeName, ['module-groups', 'user-permissions', 'user-roles']) ? 'active' : NULL}}"><i class="fe fe-settings"></i> Paramétres <i class="fa fa-angle-down horizontal-icon"></i></a>
                        <ul class="sub-menu">
                            <li aria-haspopup="true"><a href="{{url('/module-groups')}}" class="{{$routeName==='module-groups' ? 'active' : NULL}}">Groupes d'autorisation</a></li>
                            <li aria-haspopup="true"><a href="{{url('/user-permissions')}}" class="{{$routeName==='user-permissions' ? 'active' : NULL}}">Autorisations</a></li>
                            <li aria-haspopup="true"><a href="{{url('/user-roles')}}" class="{{$routeName==='roles' ? 'active' : NULL}}">Roles</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!--Nav-->
        </div>
    </div>
</div>