@extends('layouts.master')
@section('title')
    @lang('translation.wsw-analytics')
@endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<script>
    var messages = @json($messages);
</script>
    @component('components.breadcrumb')
        @slot('li_1')
            Overlord
        @endslot
        @slot('title')
            Whitsunday Web Analytics
        @endslot
    @endcomponent
    <div id="chat_user_info" data-user-id="{{ Auth::id() }}" style="display:none;"></div>
    <div class="row">
        <div class="col-xxl-5">
            <div class="d-flex flex-column h-100">
                <div class="row h-100">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body p-0">

                                <!-- START CHAT MODULE -->

                                <div class="user-chat w-100 overflow-hidden">

                                    <div class="chat-content d-lg-flex">
                                        <!-- start chat conversation section -->
                                        <div class="w-100 overflow-hidden position-relative">
                                            <!-- conversation user -->
                                            <div class="position-relative">
                    
                                                <!-- CHAT MODULE Start -->
                                                <div class="position-relative" id="users-chat">
                                                    <div class="p-3 user-chat-topbar">
                                                        <div class="row align-items-center">
                                                            <div class="col-sm-4 col-8">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="flex-shrink-0 d-block d-lg-none me-3">
                                                                        <a href="javascript: void(0);" class="user-chat-remove fs-18 p-1"><i class="ri-arrow-left-s-line align-bottom"></i></a>
                                                                    </div>
                                                                    <div class="flex-grow-1 overflow-hidden">
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="flex-shrink-0 chat-user-img online user-own-img align-self-center me-3 ms-0">
                                                                                <img src="{{URL::asset('assets/images/users/avatar-2.jpg')}}" class="rounded-circle avatar-xs" alt="">
                                                                                <span class="user-status"></span>
                                                                            </div>
                                                                            <div class="flex-grow-1 overflow-hidden">
                                                                                <h5 class="text-truncate mb-0 fs-16"><a class="text-reset username" data-bs-toggle="offcanvas" href="#userProfileCanvasExample" aria-controls="userProfileCanvasExample">Lisa Parker</a></h5>
                                                                                <p class="text-truncate text-muted mb-0 userStatus"><span>Online</span></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-8 col-4">
                                                                <ul class="list-inline user-chat-nav text-end mb-0">
                                                                    <li class="list-inline-item m-0">
                                                                        <div class="dropdown">
                                                                            <button class="btn btn-ghost-secondary btn-icon" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <i data-feather="search" class="icon-sm"></i>
                                                                            </button>
                                                                            <div class="dropdown-menu p-0 dropdown-menu-end dropdown-menu-lg">
                                                                                <div class="p-2">
                                                                                    <div class="search-box">
                                                                                        <input type="text" class="form-control bg-light border-light" placeholder="Search here..." onkeyup="searchMessages()" id="searchMessage">
                                                                                        <i class="ri-search-2-line search-icon"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                    
                                                                    <li class="list-inline-item d-none d-lg-inline-block m-0">
                                                                        <button type="button" class="btn btn-ghost-secondary btn-icon" data-bs-toggle="offcanvas" data-bs-target="#userProfileCanvasExample" aria-controls="userProfileCanvasExample">
                                                                            <i data-feather="info" class="icon-sm"></i>
                                                                        </button>
                                                                    </li>
                    
                                                                    <li class="list-inline-item m-0">
                                                                        <div class="dropdown">
                                                                            <button class="btn btn-ghost-secondary btn-icon" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <i data-feather="more-vertical" class="icon-sm"></i>
                                                                            </button>
                                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                                <a class="dropdown-item d-block d-lg-none user-profile-show" href="#"><i class="ri-user-2-fill align-bottom text-muted me-2"></i> View Profile</a>
                                                                                <a class="dropdown-item" href="#"><i class="ri-inbox-archive-line align-bottom text-muted me-2"></i> Archive</a>
                                                                                <a class="dropdown-item" href="#"><i class="ri-mic-off-line align-bottom text-muted me-2"></i> Muted</a>
                                                                                <a class="dropdown-item" href="#"><i class="ri-delete-bin-5-line align-bottom text-muted me-2"></i> Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                    
                                                    </div>
                                                    <!-- end chat user head -->
                                                    <div class="chat-conversation p-3 p-lg-4 " id="chat-conversation" data-simplebar>
                                                        <div id="elmLoader">
                                                            <div class="spinner-border text-primary avatar-sm" role="status">
                                                                <span class="visually-hidden">Loading...</span>
                                                            </div>
                                                        </div>
                                                        <ul class="list-unstyled chat-conversation-list" id="users-conversation">
                    
                                                        </ul>
                                                        <!-- end chat-conversation-list -->
                                                    </div>
                                                    <div class="alert alert-warning alert-dismissible copyclipboard-alert px-4 fade show " id="copyClipBoard" role="alert">
                                                        Message copied
                                                    </div>
                                                </div>
                    
                                                <div class="position-relative" id="channel-chat">
                                                    <div class="p-3 user-chat-topbar">
                                                        <div class="row align-items-center">
                                                            <div class="col-sm-4 col-8">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="flex-shrink-0 d-block d-lg-none me-3">
                                                                        <a href="javascript: void(0);" class="user-chat-remove fs-18 p-1"><i class="ri-arrow-left-s-line align-bottom"></i></a>
                                                                    </div>
                                                                    <div class="flex-grow-1 overflow-hidden">
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="flex-shrink-0 chat-user-img online user-own-img align-self-center me-3 ms-0">
                                                                                <img src="{{URL::asset('assets/images/users/avatar-2.jpg')}}" class="rounded-circle avatar-xs" alt="">
                                                                            </div>
                                                                            <div class="flex-grow-1 overflow-hidden">
                                                                                <h5 class="text-truncate mb-0 fs-16"><a class="text-reset username" data-bs-toggle="offcanvas" href="#userProfileCanvasExample" aria-controls="userProfileCanvasExample">Lisa Parker</a></h5>
                                                                                <p class="text-truncate text-muted fs-14 mb-0 userStatus"><small>24 Members</small></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-8 col-4">
                                                                <ul class="list-inline user-chat-nav text-end mb-0">
                                                                    <li class="list-inline-item m-0">
                                                                        <div class="dropdown">
                                                                            <button class="btn btn-ghost-secondary btn-icon" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <i data-feather="search" class="icon-sm"></i>
                                                                            </button>
                                                                            <div class="dropdown-menu p-0 dropdown-menu-end dropdown-menu-lg">
                                                                                <div class="p-2">
                                                                                    <div class="search-box">
                                                                                        <input type="text" class="form-control bg-light border-light" placeholder="Search here..." onkeyup="searchMessages()" id="searchMessage">
                                                                                        <i class="ri-search-2-line search-icon"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                    
                                                                    <li class="list-inline-item d-none d-lg-inline-block m-0">
                                                                        <button type="button" class="btn btn-ghost-secondary btn-icon" data-bs-toggle="offcanvas" data-bs-target="#userProfileCanvasExample" aria-controls="userProfileCanvasExample">
                                                                            <i data-feather="info" class="icon-sm"></i>
                                                                        </button>
                                                                    </li>
                    
                                                                    <li class="list-inline-item m-0">
                                                                        <div class="dropdown">
                                                                            <button class="btn btn-ghost-secondary btn-icon" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <i data-feather="more-vertical" class="icon-sm"></i>
                                                                            </button>
                                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                                <a class="dropdown-item d-block d-lg-none user-profile-show" href="#"><i class="ri-user-2-fill align-bottom text-muted me-2"></i> View Profile</a>
                                                                                <a class="dropdown-item" href="#"><i class="ri-inbox-archive-line align-bottom text-muted me-2"></i> Archive</a>
                                                                                <a class="dropdown-item" href="#"><i class="ri-mic-off-line align-bottom text-muted me-2"></i> Muted</a>
                                                                                <a class="dropdown-item" href="#"><i class="ri-delete-bin-5-line align-bottom text-muted me-2"></i> Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                    
                                                    </div>
                                                    <!-- end chat user head -->
                                                    <div class="chat-conversation p-3 p-lg-4" id="chat-conversation" data-simplebar>
                                                        <ul class="list-unstyled chat-conversation-list" id="channel-conversation">
                                                        </ul>
                                                        <!-- end chat-conversation-list -->
                    
                                                    </div>
                                                    <div class="alert alert-warning alert-dismissible copyclipboard-alert px-4 fade show " id="copyClipBoardChannel" role="alert">
                                                        Message copied
                                                    </div>
                                                </div>
                    
                                                <!-- end chat-conversation -->
                    
                                                <div class="chat-input-section p-3 p-lg-4">
                    
                                                    <form id="chatinput-form" enctype="multipart/form-data">
                                                        <div class="row g-0 align-items-center">
                                                            <div class="col-auto">
                                                                <div class="chat-input-links me-2">
                                                                    <div class="links-list-item">
                                                                        <button type="button" class="btn btn-link text-decoration-none emoji-btn" id="emoji-btn">
                                                                            <i class="bx bx-smile align-middle"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                    
                                                            <div class="col">
                                                                <div class="chat-input-feedback">
                                                                    Please Enter a Message
                                                                </div>
                                                                <input type="text" class="form-control chat-input bg-light border-light" id="chat-input" placeholder="Type your message..." autocomplete="off">
                                                            </div>
                                                            <div class="col-auto">
                                                                <div class="chat-input-links ms-2">
                                                                    <div class="links-list-item">
                                                                        <button type="submit" class="btn btn-success chat-send waves-effect waves-light">
                                                                            <i class="ri-send-plane-2-fill align-bottom"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                    
                                                        </div>
                                                    </form>
                                                </div>
                    
                                                <div class="replyCard">
                                                    <div class="card mb-0">
                                                        <div class="card-body py-3">
                                                            <div class="replymessage-block mb-0 d-flex align-items-start">
                                                                <div class="flex-grow-1">
                                                                    <h5 class="conversation-name"></h5>
                                                                    <p class="mb-0"></p>
                                                                </div>
                                                                <div class="flex-shrink-0">
                                                                    <button type="button" id="close_toggle" class="btn btn-sm btn-link mt-n2 me-n3 fs-18">
                                                                        <i class="bx bx-x align-middle"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END CHAT MODULE -->
                               
                            </div> <!-- end card-body-->
                        </div>
                    </div> <!-- end col-->
                </div> <!-- end row-->

                
            </div>
        </div> <!-- end col-->

        <div class="col-xxl-7">
            <div class="row">
                    <div class="col-md-6">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="fw-medium text-muted mb-0">Users</p>
                                        <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                                data-target="28.05">0</span>k</h2>
                                        <p class="mb-0 text-muted"><span class="badge bg-light text-success mb-0">
                                                <i class="ri-arrow-up-line align-middle"></i> 16.24 %
                                            </span> vs. previous month</p>
                                    </div>
                                    <div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                                <i data-feather="users" class="text-info"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-md-6">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="fw-medium text-muted mb-0">Sessions</p>
                                        <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                                data-target="97.66">0</span>k</h2>
                                        <p class="mb-0 text-muted"><span class="badge bg-light text-danger mb-0">
                                                <i class="ri-arrow-down-line align-middle"></i> 3.96 %
                                            </span> vs. previous month</p>
                                    </div>
                                    <div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                                <i data-feather="activity" class="text-info"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div> <!-- end row-->

                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="fw-medium text-muted mb-0">Avg. Visit Duration</p>
                                        <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                                data-target="3">0</span>m
                                            <span class="counter-value" data-target="40">0</span>sec
                                        </h2>
                                        <p class="mb-0 text-muted"><span class="badge bg-light text-danger mb-0">
                                                <i class="ri-arrow-down-line align-middle"></i> 0.24 %
                                            </span> vs. previous month</p>
                                    </div>
                                    <div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                                <i data-feather="clock" class="text-info"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-md-6">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="fw-medium text-muted mb-0">Bounce Rate</p>
                                        <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                                data-target="33.48">0</span>%</h2>
                                        <p class="mb-0 text-muted"><span class="badge bg-light text-success mb-0">
                                                <i class="ri-arrow-up-line align-middle"></i> 7.05 %
                                            </span> vs. previous month</p>
                                    </div>
                                    <div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                                <i data-feather="external-link" class="text-info"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div> <!-- end row-->

                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="fw-medium text-muted mb-0">Users</p>
                                        <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                                data-target="28.05">0</span>k</h2>
                                        <p class="mb-0 text-muted"><span class="badge bg-light text-success mb-0">
                                                <i class="ri-arrow-up-line align-middle"></i> 16.24 %
                                            </span> vs. previous month</p>
                                    </div>
                                    <div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                                <i data-feather="users" class="text-info"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-md-6">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="fw-medium text-muted mb-0">Sessions</p>
                                        <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                                data-target="97.66">0</span>k</h2>
                                        <p class="mb-0 text-muted"><span class="badge bg-light text-danger mb-0">
                                                <i class="ri-arrow-down-line align-middle"></i> 3.96 %
                                            </span> vs. previous month</p>
                                    </div>
                                    <div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                                <i data-feather="activity" class="text-info"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div> <!-- end row-->

                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="fw-medium text-muted mb-0">Avg. Visit Duration</p>
                                        <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                                data-target="3">0</span>m
                                            <span class="counter-value" data-target="40">0</span>sec
                                        </h2>
                                        <p class="mb-0 text-muted"><span class="badge bg-light text-danger mb-0">
                                                <i class="ri-arrow-down-line align-middle"></i> 0.24 %
                                            </span> vs. previous month</p>
                                    </div>
                                    <div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                                <i data-feather="clock" class="text-info"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-md-6">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="fw-medium text-muted mb-0">Bounce Rate</p>
                                        <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                                data-target="33.48">0</span>%</h2>
                                        <p class="mb-0 text-muted"><span class="badge bg-light text-success mb-0">
                                                <i class="ri-arrow-up-line align-middle"></i> 7.05 %
                                            </span> vs. previous month</p>
                                    </div>
                                    <div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                                <i data-feather="external-link" class="text-info"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div> <!-- end row-->
            
        </div><!-- end col -->
    </div> <!-- end row-->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header border-0 align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Audiences Metrics</h4>
                    <div>
                        <button type="button" class="btn btn-soft-secondary btn-sm">
                            ALL
                        </button>
                        <button type="button" class="btn btn-soft-secondary btn-sm">
                            1M
                        </button>
                        <button type="button" class="btn btn-soft-secondary btn-sm">
                            6M
                        </button>
                        <button type="button" class="btn btn-soft-primary btn-sm">
                            1Y
                        </button>
                    </div>
                </div><!-- end card header -->
                <div class="card-header p-0 border-0 bg-soft-light">
                    <div class="row g-0 text-center">
                        <div class="col-6 col-sm-4">
                            <div class="p-3 border border-dashed border-start-0">
                                <h5 class="mb-1"><span class="counter-value" data-target="854">0</span>
                                    <span class="text-success ms-1 fs-13">49%<i
                                            class="ri-arrow-right-up-line ms-1 align-middle"></i></span>
                                </h5>
                                <p class="text-muted mb-0">Avg. Session</p>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-6 col-sm-4">
                            <div class="p-3 border border-dashed border-start-0">
                                <h5 class="mb-1"><span class="counter-value" data-target="1278">0</span>
                                    <span class="text-success ms-1 fs-13">60%<i
                                            class="ri-arrow-right-up-line ms-1 align-middle"></i></span>
                                </h5>
                                <p class="text-muted mb-0">Conversion Rate</p>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-6 col-sm-4">
                            <div class="p-3 border border-dashed border-start-0 border-end-0">
                                <h5 class="mb-1"><span class="counter-value" data-target="3">0</span>m
                                    <span class="counter-value" data-target="40">0</span>sec
                                    <span class="text-success ms-1 fs-13">37%<i
                                            class="ri-arrow-right-up-line ms-1 align-middle"></i></span>
                                </h5>
                                <p class="text-muted mb-0">Avg. Session Duration</p>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                </div><!-- end card header -->
                <div class="card-body p-0 pb-2">
                    <div>
                        <div id="audiences_metrics_charts" data-colors='["--vz-primary", "--vz-gray-300"]'
                            class="apex-charts" dir="ltr"></div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-6">
            <div class="card card-height-100">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Audiences Sessions by Country</h4>
                    <div class="flex-shrink-0">
                        <div class="dropdown card-header-dropdown">
                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <span class="fw-semibold text-uppercase fs-13">Sort by: </span><span
                                    class="text-muted">Current Week<i class="mdi mdi-chevron-down ms-1"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Today</a>
                                <a class="dropdown-item" href="#">Last Week</a>
                                <a class="dropdown-item" href="#">Last Month</a>
                                <a class="dropdown-item" href="#">Current Year</a>
                            </div>
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body p-0">
                    <div>
                        <div id="audiences-sessions-country-charts" data-colors='["--vz-success", "--vz-secondary"]'
                            class="apex-charts" dir="ltr"></div>
                    </div>
                </div><!-- end cardbody -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->

    <div class="row">
        <div class="col-xl-4">
            <div class="card card-height-100">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Users by Device</h4>
                    <div class="flex-shrink-0">
                        <div class="dropdown card-header-dropdown">
                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <span class="text-muted fs-16"><i class="mdi mdi-dots-vertical align-middle"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Today</a>
                                <a class="dropdown-item" href="#">Last Week</a>
                                <a class="dropdown-item" href="#">Last Month</a>
                                <a class="dropdown-item" href="#">Current Year</a>
                            </div>
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <div id="user_device_pie_charts" data-colors='["--vz-primary", "--vz-warning", "--vz-info"]'
                        class="apex-charts" dir="ltr"></div>

                    <div class="table-responsive mt-3">
                        <table class="table table-borderless table-sm table-centered align-middle table-nowrap mb-0">
                            <tbody class="border-0">
                                <tr>
                                    <td>
                                        <h4 class="text-truncate fs-14 fs-medium mb-0"><i
                                                class="ri-stop-fill align-middle fs-18 text-primary me-2"></i>Desktop
                                            Users</h4>
                                    </td>
                                    <td>
                                        <p class="text-muted mb-0"><i data-feather="users"
                                                class="me-2 icon-sm"></i>78.56k</p>
                                    </td>
                                    <td class="text-end">
                                        <p class="text-success fw-medium fs-13 mb-0"><i
                                                class="ri-arrow-up-s-fill fs-5 align-middle"></i>2.08%
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4 class="text-truncate fs-14 fs-medium mb-0"><i
                                                class="ri-stop-fill align-middle fs-18 text-warning me-2"></i>Mobile
                                            Users</h4>
                                    </td>
                                    <td>
                                        <p class="text-muted mb-0"><i data-feather="users"
                                                class="me-2 icon-sm"></i>105.02k</p>
                                    </td>
                                    <td class="text-end">
                                        <p class="text-danger fw-medium fs-13 mb-0"><i
                                                class="ri-arrow-down-s-fill fs-5 align-middle"></i>10.52%
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4 class="text-truncate fs-14 fs-medium mb-0"><i
                                                class="ri-stop-fill align-middle fs-18 text-info me-2"></i>Tablet
                                            Users</h4>
                                    </td>
                                    <td>
                                        <p class="text-muted mb-0"><i data-feather="users"
                                                class="me-2 icon-sm"></i>42.89k</p>
                                    </td>
                                    <td class="text-end">
                                        <p class="text-danger fw-medium fs-13 mb-0"><i
                                                class="ri-arrow-down-s-fill fs-5 align-middle"></i>7.36%
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-4 col-md-6">
            <div class="card card-height-100">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Top Referrals Pages</h4>
                    <div class="flex-shrink-0">
                        <button type="button" class="btn btn-soft-primary btn-sm">
                            Export Report
                        </button>
                    </div>
                </div>

                <div class="card-body">

                    <div class="row align-items-center">
                        <div class="col-6">
                            <h6 class="text-muted text-uppercase fw-semibold text-truncate fs-13 mb-3">
                                Total Referrals Page</h6>
                            <h4 class="mb-0">725,800</h4>
                            <p class="mb-0 mt-2 text-muted"><span class="badge badge-soft-success mb-0">
                                    <i class="ri-arrow-up-line align-middle"></i> 15.72 %
                                </span> vs. previous month</p>
                        </div><!-- end col -->
                        <div class="col-6">
                            <div class="text-center">
                                <img src="{{ URL::asset('assets/images/illustrator-1.png') }}" class="img-fluid" alt="">
                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->
                    <div class="mt-3 pt-2">
                        <div class="progress progress-lg rounded-pill">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-info" role="progressbar" style="width: 18%" aria-valuenow="18"
                                aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-success" role="progressbar" style="width: 22%" aria-valuenow="22"
                                aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 16%" aria-valuenow="16"
                                aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 19%" aria-valuenow="19"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div><!-- end -->

                    <div class="mt-3 pt-2">
                        <div class="d-flex mb-2">
                            <div class="flex-grow-1">
                                <p class="text-truncate text-muted fs-15 mb-0"><i
                                        class="mdi mdi-circle align-middle text-primary me-2"></i>www.google.com
                                </p>
                            </div>
                            <div class="flex-shrink-0">
                                <p class="mb-0">24.58%</p>
                            </div>
                        </div><!-- end -->
                        <div class="d-flex mb-2">
                            <div class="flex-grow-1">
                                <p class="text-truncate text-muted fs-15 mb-0"><i
                                        class="mdi mdi-circle align-middle text-info me-2"></i>www.youtube.com
                                </p>
                            </div>
                            <div class="flex-shrink-0">
                                <p class="mb-0">17.51%</p>
                            </div>
                        </div><!-- end -->
                        <div class="d-flex mb-2">
                            <div class="flex-grow-1">
                                <p class="text-truncate text-muted fs-15 mb-0"><i
                                        class="mdi mdi-circle align-middle text-success me-2"></i>www.meta.com
                                </p>
                            </div>
                            <div class="flex-shrink-0">
                                <p class="mb-0">23.05%</p>
                            </div>
                        </div><!-- end -->
                        <div class="d-flex mb-2">
                            <div class="flex-grow-1">
                                <p class="text-truncate text-muted fs-15 mb-0"><i
                                        class="mdi mdi-circle align-middle text-warning me-2"></i>www.medium.com
                                </p>
                            </div>
                            <div class="flex-shrink-0">
                                <p class="mb-0">12.22%</p>
                            </div>
                        </div><!-- end -->
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate text-muted fs-15 mb-0"><i
                                        class="mdi mdi-circle align-middle text-danger me-2"></i>Other
                                </p>
                            </div>
                            <div class="flex-shrink-0">
                                <p class="mb-0">17.58%</p>
                            </div>
                        </div><!-- end -->
                    </div><!-- end -->

                    <div class="mt-2 text-center">
                        <a href="javascript:void(0);" class="text-muted text-decoration-underline">Show
                            All</a>
                    </div>

                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-4 col-md-6">
            <div class="card card-height-100">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Top Pages</h4>
                    <div class="flex-shrink-0">
                        <div class="dropdown card-header-dropdown">
                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <span class="text-muted fs-16"><i class="mdi mdi-dots-vertical align-middle"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Today</a>
                                <a class="dropdown-item" href="#">Last Week</a>
                                <a class="dropdown-item" href="#">Last Month</a>
                                <a class="dropdown-item" href="#">Current Year</a>
                            </div>
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table align-middle table-borderless table-centered table-nowrap mb-0">
                            <thead class="text-muted table-light">
                                <tr>
                                    <th scope="col" style="width: 62;">Active Page</th>
                                    <th scope="col">Active</th>
                                    <th scope="col">Users</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="javascript:void(0);">/themesbrand/skote-25867</a>
                                    </td>
                                    <td>99</td>
                                    <td>25.3%</td>
                                </tr><!-- end -->
                                <tr>
                                    <td>
                                        <a href="javascript:void(0);">/dashonic/chat-24518</a>
                                    </td>
                                    <td>86</td>
                                    <td>22.7%</td>
                                </tr><!-- end -->
                                <tr>
                                    <td>
                                        <a href="javascript:void(0);">/skote/timeline-27391</a>
                                    </td>
                                    <td>64</td>
                                    <td>18.7%</td>
                                </tr><!-- end -->
                                <tr>
                                    <td>
                                        <a href="javascript:void(0);">/themesbrand/minia-26441</a>
                                    </td>
                                    <td>53</td>
                                    <td>14.2%</td>
                                </tr><!-- end -->
                                <tr>
                                    <td>
                                        <a href="javascript:void(0);">/dashon/dashboard-29873</a>
                                    </td>
                                    <td>33</td>
                                    <td>12.6%</td>
                                </tr><!-- end -->
                                <tr>
                                    <td>
                                        <a href="javascript:void(0);">/doot/chats-29964</a>
                                    </td>
                                    <td>20</td>
                                    <td>10.9%</td>
                                </tr><!-- end -->
                                <tr>
                                    <td>
                                        <a href="javascript:void(0);">/minton/pages-29739</a>
                                    </td>
                                    <td>10</td>
                                    <td>07.3%</td>
                                </tr><!-- end -->
                            </tbody><!-- end tbody -->
                        </table><!-- end table -->
                    </div><!-- end -->
                </div><!-- end cardbody -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->
@endsection
@section('script')

    
    <!-- apexcharts -->
    <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.js') }}"></script>
    {{-- <script src="{{ URL::asset('assets/libs/jsvectormap//world-merc.js') }}"></script> --}}

    <script src="{{ URL::asset('assets/libs/glightbox/glightbox.min.js') }}"></script>

    <!-- fgEmojiPicker js -->
    <script src="{{ URL::asset('assets/libs/fg-emoji-picker/fg-emoji-picker.min.js') }}"></script>

    <!-- chat init js -->
    <script src="{{ URL::asset('assets/js/pages/chat.init.js') }}"></script>

    <!-- dashboard init -->
    <script src="{{ URL::asset('/assets/js/pages/dashboard-analytics.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
