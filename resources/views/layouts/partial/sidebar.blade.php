<aside id="leftsidebar" class="sidebar">
    <ul class="nav nav-tabs">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#dashboard"><i class="zmdi zmdi-home"></i></a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#user">Professors</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane stretchRight active" id="dashboard">
            <div class="menu">
                <ul class="list">
                    <li>
                        <div class="user-info">
                            <div class="image"><a href="profile.html"><img src="https://via.placeholder.com/80x80" alt="User"></a></div>
                            <div class="detail">
                                <h4>{{ Auth::user()->name }}</h4>
                                <small>{{ Auth::user()->user_type }}</small>
                            </div>
                        </div>
                    </li>
                        <li class="header">MAIN</li>
                    @if(Request::is('admin/*'))
                        <li class="{{ Request::is('admin/dashboard') ? 'active open' : '' }}">
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="zmdi zmdi-home"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('admin/course') ? 'active open' : '' }}">
                            <a href="{{ route('course.index') }}">
                                <i class="zmdi zmdi-home"></i>
                                <span>Course</span>
                            </a>
                        </li>
                    @elseif(Request::is('student/*'))
                        <li class="{{ Request::is('student/dashboard') ? 'active open' : '' }}">
                            <a href="{{ route('student.dashboard') }}">
                                <i class="zmdi zmdi-home"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('student/course') ? 'active open' : '' }}">
                            <a href="{{ route('student.course') }}">
                                <i class="zmdi zmdi-home"></i>
                                <span>Course</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="tab-pane stretchLeft" id="user">
            <div class="menu">
                <ul class="list">
                    <li>
                        <div class="user-info m-b-20 p-b-15">
                            <div class="image"><a href="profile.html"><img src="https://via.placeholder.com/80x80" alt="User"></a></div>
                            <div class="detail">
                                <h4>Pro. Charlotte</h4>
                                <small>UI UX Designer</small>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <a title="facebook" href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a>
                                    <a title="twitter" href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a>
                                    <a title="instagram" href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a>
                                </div>
                                <div class="col-4 p-r-0">
                                    <h5 class="m-b-5">13</h5>
                                    <small>Exp</small>
                                </div>
                                <div class="col-4">
                                    <h5 class="m-b-5">33</h5>
                                    <small>Awards</small>
                                </div>
                                <div class="col-4 p-l-0">
                                    <h5 class="m-b-5">237</h5>
                                    <small>Class</small>
                                </div>                                
                            </div>
                        </div>
                    </li>
                    <li>
                        <small class="text-muted">Location: </small>
                        <p>795 Folsom Ave, Suite 600 San Francisco, CADGE 94107</p>
                        <hr>
                        <small class="text-muted">Email address: </small>
                        <p>Charlotte@example.com</p>
                        <hr>
                        <small class="text-muted">Phone: </small>
                        <p>+ 202-555-0191</p>
                        <hr>                        
                        <ul class="list-unstyled">
                            <li>
                                <div>Photoshop</div>
                                <div class="progress m-b-20">
                                    <div class="progress-bar l-blue " role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: 89%"> <span class="sr-only">89% Complete</span> </div>
                                </div>
                            </li>
                            <li>
                                <div>Illustrator</div>
                                <div class="progress m-b-20">
                                    <div class="progress-bar l-amber" role="progressbar" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100" style="width: 56%"> <span class="sr-only">56% Complete</span> </div>
                                </div>
                            </li>
                            <li>
                                <div>Art & Design</div>
                                <div class="progress m-b-20">
                                    <div class="progress-bar l-green" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%"> <span class="sr-only">78% Complete</span> </div>
                                </div>
                            </li>
                            <li>
                                <div>HTML</div>
                                <div class="progress m-b-20">
                                    <div class="progress-bar l-blush" role="progressbar" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100" style="width: 56%"> <span class="sr-only">56% Complete</span> </div>
                                </div>
                            </li>
                            <li>
                                <div>CSS</div>
                                <div class="progress m-b-20">
                                    <div class="progress-bar l-parpl" role="progressbar" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100" style="width: 50%"> <span class="sr-only">50% Complete</span> </div>
                                </div>
                            </li>
                        </ul>                        
                    </li>                    
                </ul>
            </div>
        </div>
    </div>    
</aside>