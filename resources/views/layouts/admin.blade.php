<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <meta name="author" content="theme_ocean">

    <style>
        /* Style for Select2 dropdown */
        .select2-container--default .select2-selection--multiple {
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: 4px;
            color: black !important; /* Text color */
            min-height: 38px; /* Adjust height as needed */
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #007bff;
            border-color: #007bff;
            color: black !important; /* Text color */
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: black !important; /* Text color */
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            color: black !important; /* Text color */
        }

        /* Ensure text color inside Select2 dropdown */
        .select2-container--default .select2-results__option {
            color: black !important; /* Text color */
        }
    </style>

    <!--! The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags !-->
    <!--! BEGIN: Apps Title-->
    <title>Cheff Catrin</title>
    <!--! END:  Apps Title-->
    <!--! BEGIN: Favicon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/admins/assets/images/favicon.ico') }}">
    <!--! END: Favicon-->
    <!--! BEGIN: Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/admins/assets/css/bootstrap.min.css') }}">
    <!--! END: Bootstrap CSS-->

    <!--! BEGIN: Vendors CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/admins/assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/admins/assets/vendors/css/select2-theme.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('/admins/assets/vendors/css/jquery.steps.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/admins/assets/vendors/css/quill.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/admins/assets/vendors/css/datepicker.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('/admins/assets/css/theme.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body>
<!--! ================================================================ !-->
<!--! [Start] Navigation Manu !-->
<!--! ================================================================ !-->
<x-pages.sidebar></x-pages.sidebar>
<!--! ================================================================ !-->
<!--! [End]  Navigation Manu !-->
<!--! ================================================================ !-->

<!--! ================================================================ !-->
<!--! [Start] Header !-->
<!--! ================================================================ !-->
<x-pages.header></x-pages.header>
<!--! ================================================================ !-->
<!--! [End] Header !-->
<!--! ================================================================ !-->

@yield('content')

<!--! ================================================================ !-->
<!--! [Start] Search Modal !-->
<!--! ================================================================ !-->
<div class="modal fade-scale" id="searchModal" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-top modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header search-form py-0">
                <div class="input-group">
                        <span class="input-group-text">
                            <i class="feather-search fs-4 text-muted"></i>
                        </span>
                    <input type="text" class="form-control search-input-field" placeholder="Search...">
                    <span class="input-group-text">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </span>
                </div>
            </div>
            <div class="modal-body">
                <div class="searching-for mb-5">
                    <h4 class="fs-13 fw-normal text-gray-600 mb-3">I'm searching for...</h4>
                    <div class="row g-1">
                        <div class="col-md-4 col-xl-2">
                            <a href="javascript:void(0);" class="d-flex align-items-center gap-2 px-3 lh-lg border rounded-pill">
                                <i class="feather-compass"></i>
                                <span>Recent</span>
                            </a>
                        </div>
                        <div class="col-md-4 col-xl-2">
                            <a href="javascript:void(0);" class="d-flex align-items-center gap-2 px-3 lh-lg border rounded-pill">
                                <i class="feather-command"></i>
                                <span>Command</span>
                            </a>
                        </div>
                        <div class="col-md-4 col-xl-2">
                            <a href="javascript:void(0);" class="d-flex align-items-center gap-2 px-3 lh-lg border rounded-pill">
                                <i class="feather-users"></i>
                                <span>Peoples</span>
                            </a>
                        </div>
                        <div class="col-md-4 col-xl-2">
                            <a href="javascript:void(0);" class="d-flex align-items-center gap-2 px-3 lh-lg border rounded-pill">
                                <i class="feather-file"></i>
                                <span>Files</span>
                            </a>
                        </div>
                        <div class="col-md-4 col-xl-2">
                            <a href="javascript:void(0);" class="d-flex align-items-center gap-2 px-3 lh-lg border rounded-pill">
                                <i class="feather-video"></i>
                                <span>Medias</span>
                            </a>
                        </div>
                        <div class="col-md-4 col-xl-2">
                            <a href="javascript:void(0);" class="d-flex align-items-center gap-2 px-3 lh-lg border rounded-pill">
                                <span>More</span>
                                <i class="feather-chevron-down"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="recent-result mb-5">
                    <h4 class="fs-13 fw-normal text-gray-600 mb-3">Recnet <span class="badge small rounded ms-1 text-dark">3</span></h4>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <a href="javascript:void(0);" class="d-flex align-items-start gap-3">
                            <i class="feather-airplay fs-5"></i>
                            <div class="fs-13 fw-semibold">CRM dashboard redesign</div>
                        </a>
                        <a href="javascript:void(0);" class="badge border rounded text-dark">/<i class="feather-command ms-1"></i></a>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <a href="javascript:void(0);" class="d-flex align-items-start gap-3">
                            <i class="feather-file-plus fs-5"></i>
                            <div class="fs-13 fw-semibold">Create new eocument</div>
                        </a>
                        <a href="javascript:void(0);" class="badge border rounded text-dark">N /<i class="feather-command ms-1"></i></a>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="javascript:void(0);" class="d-flex align-items-start gap-3">
                            <i class="feather-user-plus fs-5"></i>
                            <div class="fs-13 fw-semibold">Invite project colleagues</div>
                        </a>
                        <a href="javascript:void(0);" class="badge border rounded text-dark">P /<i class="feather-command ms-1"></i></a>
                    </div>
                </div>
                <div class="command-result mb-5">
                    <h4 class="fs-13 fw-normal text-gray-600 mb-3">Command <span class="badge small rounded ms-1 text-dark">5</span></h4>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <a href="javascript:void(0);" class="d-flex align-items-start gap-3">
                            <i class="feather-user fs-5"></i>
                            <div class="fs-13 fw-semibold">My profile</div>
                        </a>
                        <a href="javascript:void(0);" class="badge border rounded text-dark">P /<i class="feather-command ms-1"></i></a>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <a href="javascript:void(0);" class="d-flex align-items-start gap-3">
                            <i class="feather-users fs-5"></i>
                            <div class="fs-13 fw-semibold">Team profile</div>
                        </a>
                        <a href="javascript:void(0);" class="badge border rounded text-dark">T /<i class="feather-command ms-1"></i></a>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <a href="javascript:void(0);" class="d-flex align-items-start gap-3">
                            <i class="feather-user-plus fs-5"></i>
                            <div class="fs-13 fw-semibold">Invite colleagues</div>
                        </a>
                        <a href="javascript:void(0);" class="badge border rounded text-dark">I /<i class="feather-command ms-1"></i></a>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <a href="javascript:void(0);" class="d-flex align-items-start gap-3">
                            <i class="feather-briefcase fs-5"></i>
                            <div class="fs-13 fw-semibold">Create new project</div>
                        </a>
                        <a href="javascript:void(0);" class="badge border rounded text-dark">CP /<i class="feather-command ms-1"></i></a>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="javascript:void(0);" class="d-flex align-items-start gap-3">
                            <i class="feather-life-buoy fs-5"></i>
                            <div class="fs-13 fw-semibold">Support center</div>
                        </a>
                        <a href="javascript:void(0);" class="badge border rounded text-dark">SC /<i class="feather-command ms-1"></i></a>
                    </div>
                </div>
                <div class="file-result mb-4">
                    <h4 class="fs-13 fw-normal text-gray-600 mb-3">Files <span class="badge small rounded ms-1 text-dark">3</span></h4>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <a href="javascript:void(0);" class="d-flex align-items-start gap-3">
                            <i class="feather-folder-plus fs-5"></i>
                            <div class="fs-13 fw-semibold">CRM Desing Project <span class="fs-12 fw-normal text-muted">(56.74 MB)</span></div>
                        </a>
                        <a href="javascript:void(0);" class="file-download"><i class="feather-download"></i></a>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <a href="javascript:void(0);" class="d-flex align-items-start gap-3">
                            <i class="feather-folder-plus fs-5"></i>
                            <div class="fs-13 fw-semibold">Admin Dashboard Project <span class="fs-12 fw-normal text-muted">(46.83 MB)</span></div>
                        </a>
                        <a href="javascript:void(0);" class="file-download"><i class="feather-download"></i></a>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="javascript:void(0);" class="d-flex align-items-start gap-3">
                            <i class="feather-folder-plus fs-5"></i>
                            <div class="fs-13 fw-semibold">CRM Dashboard Project <span class="fs-12 fw-normal text-muted">(68.59 MB)</span></div>
                        </a>
                        <a href="javascript:void(0);" class="file-download"><i class="feather-download"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--! ================================================================ !-->
<!--! [End] Search Modal !-->
<!--! ================================================================ !-->
<!--! ================================================================ !-->
<!--! [Start] Language Select !-->
<!--! ================================================================ !-->
<div class="modal fade-scale" id="languageSelectModal" aria-hidden="true" aria-labelledby="languageSelectModalLabel" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="languageSelectModalLabel">Select Language</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6 col-md-4 col-lg-3 language_select active">
                        <a href="javascript:void(0);" class="d-flex align-items-center gap-2">
                            <div class="avatar-image avatar-sm"><img src="/admins/assets/vendors/img/flags/1x1/us.svg" alt="" class="img-fluid"></div>
                            <span>English </span>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 language_select">
                        <a href="javascript:void(0);" class="d-flex align-items-center gap-2">
                            <div class="avatar-image avatar-sm"><img src="/admins/assets/vendors/img/flags/1x1/ru.svg" alt="" class="img-fluid"></div>
                            <span>Russian </span>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 language_select">
                        <a href="javascript:void(0);" class="d-flex align-items-center gap-2">
                            <div class="avatar-image avatar-sm"><img src="/admins/assets/vendors/img/flags/1x1/tr.svg" alt="" class="img-fluid"></div>
                            <span>Turkish </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--! ================================================================ !-->
<!--! [End] Language Select !-->
<!--! ================================================================ !-->
<!--! ================================================================ !-->
<!--! BEGIN: Downloading Toast !-->
<!--! ================================================================ !-->
<div class="position-fixed" style="right: 5px; bottom: 5px; z-index: 999999">
    <div id="toast" class="toast bg-black hide" data-bs-delay="3000" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header px-3 bg-transparent d-flex align-items-center justify-content-between border-bottom border-light border-opacity-10">
            <div class="text-white mb-0 mr-auto">Downloading...</div>
            <a href="javascript:void(0)" class="ms-2 mb-1 close fw-normal" data-bs-dismiss="toast" aria-label="Close">
                <span class="text-white">&times;</span>
            </a>
        </div>
        <div class="toast-body p-3 text-white">
            <h6 class="fs-13 text-white">Project.zip</h6>
            <span class="text-light fs-11">4.2mb of 5.5mb</span>
        </div>
        <div class="toast-footer p-3 pt-0 border-top border-light border-opacity-10">
            <div class="progress mt-3" style="height: 5px">
                <div class="progress-bar progress-bar-striped progress-bar-animated w-75 bg-dark" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>
</div>
<!--! ================================================================ !-->
<!--! END: Downloading Toast !-->
<!--! ================================================================ !-->
<!--! ================================================================ !-->
<!--! BEGIN: Theme Customizer !-->
<!--! ================================================================ !-->
<div class="theme-customizer">
    <div class="customizer-handle">
        <a href="javascript:void(0);" class="cutomizer-open-trigger bg-primary">
            <i class="feather-settings"></i>
        </a>
    </div>
    <div class="customizer-sidebar-wrapper">
        <div class="customizer-sidebar-header px-4 ht-80 border-bottom d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Theme Settings</h5>
            <a href="javascript:void(0);" class="cutomizer-close-trigger d-flex">
                <i class="feather-x"></i>
            </a>
        </div>
        <div class="customizer-sidebar-body position-relative p-4" data-scrollbar-target="#psScrollbarInit">
            <!--! BEGIN: [Navigation] !-->
            <div class="position-relative px-3 pb-3 pt-4 mt-3 mb-5 border border-gray-2 theme-options-set">
                <label class="py-1 px-2 fs-8 fw-bold text-uppercase text-muted text-spacing-2 bg-white border border-gray-2 position-absolute rounded-2 options-label" style="top: -12px">Navigation</label>
                <div class="row g-2 theme-options-items app-navigation" id="appNavigationList">
                    <div class="col-6 text-center single-option">
                        <input type="radio" class="btn-check" id="app-navigation-light" name="app-navigation" value="1" data-app-navigation="app-navigation-light" checked>
                        <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-navigation-light">Light</label>
                    </div>
                    <div class="col-6 text-center single-option">
                        <input type="radio" class="btn-check" id="app-navigation-dark" name="app-navigation" value="2" data-app-navigation="app-navigation-dark">
                        <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-navigation-dark">Dark</label>
                    </div>
                </div>
            </div>
            <!--! END: [Navigation] !-->
            <!--! BEGIN: [Header] !-->
            <div class="position-relative px-3 pb-3 pt-4 mt-3 mb-5 border border-gray-2 theme-options-set mt-5">
                <label class="py-1 px-2 fs-8 fw-bold text-uppercase text-muted text-spacing-2 bg-white border border-gray-2 position-absolute rounded-2 options-label" style="top: -12px">Header</label>
                <div class="row g-2 theme-options-items app-header" id="appHeaderList">
                    <div class="col-6 text-center single-option">
                        <input type="radio" class="btn-check" id="app-header-light" name="app-header" value="1" data-app-header="app-header-light" checked>
                        <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-header-light">Light</label>
                    </div>
                    <div class="col-6 text-center single-option">
                        <input type="radio" class="btn-check" id="app-header-dark" name="app-header" value="2" data-app-header="app-header-dark">
                        <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-header-dark">Dark</label>
                    </div>
                </div>
            </div>
            <!--! END: [Header] !-->
            <!--! BEGIN: [Skins] !-->
            <div class="position-relative px-3 pb-3 pt-4 mt-3 mb-5 border border-gray-2 theme-options-set">
                <label class="py-1 px-2 fs-8 fw-bold text-uppercase text-muted text-spacing-2 bg-white border border-gray-2 position-absolute rounded-2 options-label" style="top: -12px">Skins</label>
                <div class="row g-2 theme-options-items app-skin" id="appSkinList">
                    <div class="col-6 text-center position-relative single-option light-button active">
                        <input type="radio" class="btn-check" id="app-skin-light" name="app-skin" value="1" data-app-skin="app-skin-light">
                        <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-skin-light">Light</label>
                    </div>
                    <div class="col-6 text-center position-relative single-option dark-button">
                        <input type="radio" class="btn-check" id="app-skin-dark" name="app-skin" value="2" data-app-skin="app-skin-dark">
                        <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-skin-dark">Dark</label>
                    </div>
                </div>
            </div>
            <!--! END: [Skins] !-->
            <!--! BEGIN: [Typography] !-->
            <div class="position-relative px-3 pb-3 pt-4 mt-3 mb-0 border border-gray-2 theme-options-set">
                <label class="py-1 px-2 fs-8 fw-bold text-uppercase text-muted text-spacing-2 bg-white border border-gray-2 position-absolute rounded-2 options-label" style="top: -12px">Typography</label>
                <div class="row g-2 theme-options-items font-family" id="fontFamilyList">
                    <div class="col-6 text-center single-option">
                        <input type="radio" class="btn-check" id="app-font-family-lato" name="font-family" value="1" data-font-family="app-font-family-lato">
                        <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-lato">Lato</label>
                    </div>
                    <div class="col-6 text-center single-option">
                        <input type="radio" class="btn-check" id="app-font-family-rubik" name="font-family" value="2" data-font-family="app-font-family-rubik">
                        <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-rubik">Rubik</label>
                    </div>
                    <div class="col-6 text-center single-option">
                        <input type="radio" class="btn-check" id="app-font-family-inter" name="font-family" value="3" data-font-family="app-font-family-inter" checked>
                        <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-inter">Inter</label>
                    </div>
                    <div class="col-6 text-center single-option">
                        <input type="radio" class="btn-check" id="app-font-family-cinzel" name="font-family" value="4" data-font-family="app-font-family-cinzel">
                        <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-cinzel">Cinzel</label>
                    </div>
                    <div class="col-6 text-center single-option">
                        <input type="radio" class="btn-check" id="app-font-family-nunito" name="font-family" value="6" data-font-family="app-font-family-nunito">
                        <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-nunito">Nunito</label>
                    </div>
                    <div class="col-6 text-center single-option">
                        <input type="radio" class="btn-check" id="app-font-family-roboto" name="font-family" value="7" data-font-family="app-font-family-roboto">
                        <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-roboto">Roboto</label>
                    </div>
                    <div class="col-6 text-center single-option">
                        <input type="radio" class="btn-check" id="app-font-family-ubuntu" name="font-family" value="8" data-font-family="app-font-family-ubuntu">
                        <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-ubuntu">Ubuntu</label>
                    </div>
                    <div class="col-6 text-center single-option">
                        <input type="radio" class="btn-check" id="app-font-family-poppins" name="font-family" value="9" data-font-family="app-font-family-poppins">
                        <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-poppins">Poppins</label>
                    </div>
                    <div class="col-6 text-center single-option">
                        <input type="radio" class="btn-check" id="app-font-family-raleway" name="font-family" value="10" data-font-family="app-font-family-raleway">
                        <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-raleway">Raleway</label>
                    </div>
                    <div class="col-6 text-center single-option">
                        <input type="radio" class="btn-check" id="app-font-family-system-ui" name="font-family" value="11" data-font-family="app-font-family-system-ui">
                        <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-system-ui">System UI</label>
                    </div>
                    <div class="col-6 text-center single-option">
                        <input type="radio" class="btn-check" id="app-font-family-noto-sans" name="font-family" value="12" data-font-family="app-font-family-noto-sans">
                        <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-noto-sans">Noto Sans</label>
                    </div>
                    <div class="col-6 text-center single-option">
                        <input type="radio" class="btn-check" id="app-font-family-fira-sans" name="font-family" value="13" data-font-family="app-font-family-fira-sans">
                        <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-fira-sans">Fira Sans</label>
                    </div>
                    <div class="col-6 text-center single-option">
                        <input type="radio" class="btn-check" id="app-font-family-work-sans" name="font-family" value="14" data-font-family="app-font-family-work-sans">
                        <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-work-sans">Work Sans</label>
                    </div>
                    <div class="col-6 text-center single-option">
                        <input type="radio" class="btn-check" id="app-font-family-open-sans" name="font-family" value="15" data-font-family="app-font-family-open-sans">
                        <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-open-sans">Open Sans</label>
                    </div>
                    <div class="col-6 text-center single-option">
                        <input type="radio" class="btn-check" id="app-font-family-maven-pro" name="font-family" value="16" data-font-family="app-font-family-maven-pro">
                        <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-maven-pro">Maven Pro</label>
                    </div>
                    <div class="col-6 text-center single-option">
                        <input type="radio" class="btn-check" id="app-font-family-quicksand" name="font-family" value="17" data-font-family="app-font-family-quicksand">
                        <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-quicksand">Quicksand</label>
                    </div>
                    <div class="col-6 text-center single-option">
                        <input type="radio" class="btn-check" id="app-font-family-montserrat" name="font-family" value="18" data-font-family="app-font-family-montserrat">
                        <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-montserrat">Montserrat</label>
                    </div>
                    <div class="col-6 text-center single-option">
                        <input type="radio" class="btn-check" id="app-font-family-josefin-sans" name="font-family" value="19" data-font-family="app-font-family-josefin-sans">
                        <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-josefin-sans">Josefin Sans</label>
                    </div>
                    <div class="col-6 text-center single-option">
                        <input type="radio" class="btn-check" id="app-font-family-ibm-plex-sans" name="font-family" value="20" data-font-family="app-font-family-ibm-plex-sans">
                        <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-ibm-plex-sans">IBM Plex Sans</label>
                    </div>
                    <div class="col-6 text-center single-option">
                        <input type="radio" class="btn-check" id="app-font-family-source-sans-pro" name="font-family" value="5" data-font-family="app-font-family-source-sans-pro">
                        <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-source-sans-pro">Source Sans Pro</label>
                    </div>
                    <div class="col-6 text-center single-option">
                        <input type="radio" class="btn-check" id="app-font-family-montserrat-alt" name="font-family" value="21" data-font-family="app-font-family-montserrat-alt">
                        <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-montserrat-alt">Montserrat Alt</label>
                    </div>
                    <div class="col-6 text-center single-option">
                        <input type="radio" class="btn-check" id="app-font-family-roboto-slab" name="font-family" value="22" data-font-family="app-font-family-roboto-slab">
                        <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-roboto-slab">Roboto Slab</label>
                    </div>
                </div>
            </div>
            <!--! END: [Typography] !-->
        </div>
        <div class="customizer-sidebar-footer px-4 ht-60 border-top d-flex align-items-center gap-2">
            <div class="flex-fill w-50">
                <a href="javascript:void(0);" class="btn btn-danger" data-style="reset-all-common-style">Reset</a>
            </div>
            <div class="flex-fill w-50">
                <a href="javascript:void(0);" class="btn btn-primary">Download</a>
            </div>
        </div>
    </div>
</div>

<!--! ================================================================ !-->
<!--! [End] Theme Customizer !-->
<!--! ================================================================ !-->
<!--! ================================================================ !-->
<!--! Footer Script !-->
<!--! ================================================================ !-->

<!--! BEGIN: Vendors JS !-->
<script src="{{ asset('/admins/assets/vendors/js/vendors.min.js') }}"></script>
<!-- vendors.min.js {always must need to be top} -->
<script src="{{ asset('/admins/assets/vendors/js/apexcharts.min.js') }}"></script>
<script src="{{ asset('/admins/assets/vendors/js/circle-progress.min.js') }}"></script>
<script src="{{ asset('/admins/assets/vendors/js/select2.min.js') }}"></script>
<script src="{{ asset('/admins/assets/vendors/js/select2-active.min.js') }}"></script>
<!-- For employees JS-->
<script src="{{ asset('/admins/assets/vendors/js/quill.min.js') }}"></script>
<script src="{{ asset('/admins/assets/vendors/js/datepicker.min.js') }}"></script>
<!--! END: Vendors JS !-->
<!--! BEGIN: Apps Init  !-->
<script src="{{ asset('/admins/assets/js/common-init.min.js') }}"></script>
<script src="{{ asset('/admins/assets/js/reports-leads-init.min.js') }}"></script>
<!--! END: Apps Init !-->
<!--! BEGIN: Theme Customizer  !-->
<script src="{{ asset('/admins/assets/js/theme-customizer-init.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<!--! END: Theme Customizer !-->

</body>

</html>
