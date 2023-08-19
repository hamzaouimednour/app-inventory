<div class="sidebar sidebar-right sidebar-animate">
    <div class="p-4 border-bottom">
        <span class="fs-17">Paramètres de profil</span>
        <a href="#" class="sidebar-icon text-right float-right" data-toggle="sidebar-right" data-target=".sidebar-right">
            <i class="fe fe-x"></i>
        </a> 
    </div>
    <div class="card-body p-0">
        <div class="header-user text-center mt-4 pb-4">
            <span class=" avatar-xxl brround">
                @if (!empty(Auth::user()->profile_picture))
                    <img src="{{asset('assets/images/profile/'.Auth::user()->profile_picture)}}" alt="Profile-img" class=" avatar-xxl brround">
                @else
                    <img src="{{asset('assets/images/photos/user.png')}}" alt="Profile-img" class=" avatar-xxl brround">
                @endif
            </span>
            <div class="dropdown-item text-center font-weight-semibold user h3 mb-0 p-0 mt-3">
                @if  (Auth::check()) 
                    {{Auth::user()->nom}} {{Auth::user()->prenom}}
                @endif
            </div>
            <small>
                @if  (Auth::check()) 
                    {{Auth::user()->userRole->role}}
                @endif
            </small>
            <div class="card-body">
                @if  (Auth::user()->userRole->id != 3) 
                <div class="form-group ">
                    <label class="form-label text-left">Website</label>
                    <select class="form-control selectpicker" data-placeholder="passer à">
                        <option label="passer à"> </option>
                    </select>
                </div>
                @endif
            </div>
        </div>

        <div class="card-body border-top">
            <div class="row">
                <div class="col-4 text-center">
                    <a class="" href="">
                        <i class="dropdown-icon mdi  mdi-message-outline fs-30 m-0 leading-tight"></i>
                    </a>
                    <div>Inbox</div>
                </div>
                <div class="col-4 text-center">
                    <a class="" href="{{asset('/profile')}}">
                        <i class="dropdown-icon mdi mdi-tune fs-30 m-0 leading-tight"></i>
                    </a>
                    <div>Paramètres</div>
                </div>
                <div class="col-4 text-center">
                    <a class="" href="{{asset('/logout')}}">
                        <i class="dropdown-icon mdi mdi-logout-variant fs-30 m-0 leading-tight"></i>
                    </a>
                    <div>Déconnexion</div>
                </div>
            </div>
        </div>
    </div>
</div>