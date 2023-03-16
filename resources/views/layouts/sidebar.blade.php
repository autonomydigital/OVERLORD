<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('assets/images/logo-dark.png') }}" alt="" height="21">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('assets/images/logo-sm.png') }}" alt="" style="margin-left:-9px !important;" height="32">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('assets/images/logo-light.png') }}" alt="" height="34">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            
            <ul class="navbar-nav" id="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="apps-chat">
                        <i class="las la-tachometer-alt"></i> <span>@lang('translation.zep')</span>
                   </a>
               </li>
               <li class="nav-item">
                <a class="nav-link" href="dashboard-analytics">
                    <i class="las la-tachometer-alt"></i> <span>@lang('translation.dashboard')</span>
               </a>
           </li>
                <li class="nav-item">
                    <a class="nav-link" href="apps-calendar">
                        <i class="las la-calendar-alt"></i> <span>@lang('translation.calendar')</span>
                   </a>
               </li>

                <li class="menu-title"><span>@lang('translation.wsw')</span></li>

                <li class="nav-item">
                    <a href="#sidebarProjects" class="nav-link menu-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProjects"><i class="las la-project-diagram"></i> <span>@lang('translation.projects')
                    </span></a>
                    <div class="collapse menu-dropdown" id="sidebarProjects">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="apps-projects-list" class="nav-link">@lang('translation.project-list')</a>
                            </li>
                            <li class="nav-item">
                                <a href="apps-tasks-list-view" class="nav-link">@lang('translation.tasks-list')</a>
                            </li>
                            <li class="nav-item">
                                <a href="apps-projects-create" class="nav-link">@lang('translation.project-create')</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="#sidebarClients" class="nav-link menu-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarClients"><i class="las la-user"></i> <span>@lang('translation.clients')
                    </span></a>
                    <div class="collapse menu-dropdown" id="sidebarClients">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="apps-crm-companies" class="nav-link">@lang('translation.companies')</a>
                            </li>
                            <li class="nav-item">
                                <a href="apps-crm-contacts" class="nav-link">@lang('translation.contacts')</a>
                            </li>
                            <li class="nav-item">
                                <a href="apps-crm-deals" class="nav-link">@lang('translation.prospects')</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="#sidebarInvoices" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarInvoices"><i class="las la-dollar-sign"></i> <span>@lang('translation.invoices')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarInvoices">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="apps-invoices-list" class="nav-link">@lang('translation.invoices-list')</a>
                            </li>
                            <li class="nav-item">
                                <a href="apps-invoices-create" class="nav-link">@lang('translation.invoices-create')</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="apps-tickets-list">
                        <i class="las la-grin-stars"></i> <span>@lang('translation.support')</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="apps-file-manager">
                        <i class="las la-folder"></i> <span>@lang('translation.file-manager')</span>
                    </a>
                </li>


                

               <li class="menu-title"><span>@lang('translation.bbh')</span></li>

               

                <li class="menu-title"><span>@lang('translation.bws')</span></li>

                

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
