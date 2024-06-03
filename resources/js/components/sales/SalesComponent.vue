<template>

    <div class="d-flex flex-column flex-column-fluid">

        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Sales Centre</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <span class="d-block pt-2 fw-bold text-gray-500 font-size-sm" v-if="user !== null">LOGGED IN USER: {{ user.first_name.toUpperCase() }} {{ user.last_name.toUpperCase() }} </span>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">

            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">

                <div class="row g-5 g-xl-8">

                    <div class="col-7">

                        <!--begin::Card-->
                        <div class="card card-custom">

                            <div class="card-body min-h-400px">

                                <div class="row">
                                    <div class="col-4">

                                        <div class="d-grid gap-2">
                                            <!--begin::Export-->
                                            <button type="button" class="btn btn-danger fw-bolder" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                                                <span v-if="category_name === ''">CATEGORIES</span>
                                                <span v-else v-cloak>{{ category_name.toUpperCase() }}</span>
                                            </button>
                                            <!--end::Export-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3" @click.prevent="clearCategories()">All Categories</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3" v-for="(category, index) in categories" @click.prevent="filterCategories(category)"> {{ category.name }}</a>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-4">
                                        <div class="d-grid gap-2">
                                            <a href="#" class="btn btn-success btn-lg fw-bolder" type="button" @click.prevent="createNewSale()"><i class="fas fa-circle-plus fs-4 me-2"></i> NEW SALE</a>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="d-grid gap-2">
                                            <a href="#" class="btn btn-warning btn-lg fw-bolder" type="button" @click.prevent="fetchPendingSales()"><i class="fas fa-file fs-4 me-2"></i> PENDING</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">

                                    <div class="col-8">
                                        <div class="input-group mb-5">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="ki-duotone ki-filter-search fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                            </span>
                                            <input type="text" class="form-control fw-bolder" placeholder="Search/Scan Products" v-model="search_query" @keyup.enter="parseBarcode"/>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-check form-switch form-check-custom form-check-solid mt-3">
                                            <input class="form-check-input" type="checkbox" value="" id="flexSwitchScanMode" v-model="scan_mode"/>
                                            <label class="form-check-label fw-bolder" for="flexSwitchScanMode">
                                                Enable Scan mode
                                            </label>
                                        </div>
                                    </div>

                                </div>

                                <div class="row mt-3">
                                    <div class="col-3">
                                        <div class="d-grid gap-2">
                                            <a href="#" class="btn btn-primary btn-lg"
                                               @click.prevent="quickSearch(1)"
                                               v-bind:class="{ 'btn-success': quick_search_1 }"><i class="fas fa-magnifying-glass fs-4 me-2"></i> A B</a>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="d-grid gap-2">
                                            <a href="#" class="btn btn-primary btn-lg btn-block"
                                               @click.prevent="quickSearch(2)" v-bind:class="{ 'btn-success': quick_search_2 }"><i class="fas fa-magnifying-glass fs-4 me-2"></i> C D</a>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="d-grid gap-2">
                                            <a href="#" class="btn btn-primary btn-lg btn-block"
                                               @click.prevent="quickSearch(3)" v-bind:class="{ 'btn-success': quick_search_3 }"><i class="fas fa-magnifying-glass fs-4 me-2"></i> E F</a>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="d-grid gap-2">
                                            <a href="#" class="btn btn-primary btn-lg btn-block"
                                               @click.prevent="quickSearch(4)" v-bind:class="{ 'btn-success': quick_search_4 }"><i class="fas fa-magnifying-glass fs-4 me-2"></i> G H </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-3">
                                        <div class="d-grid gap-2">
                                            <a href="#" class="btn btn-primary btn-lg btn-block"
                                               @click.prevent="quickSearch(5)" v-bind:class="{ 'btn-success': quick_search_5 }"><i class="fas fa-magnifying-glass fs-4 me-2"></i> I J</a>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="d-grid gap-2">
                                            <a href="#" class="btn btn-primary btn-lg btn-block"
                                               @click.prevent="quickSearch(6)"
                                               v-bind:class="{ 'btn-success': quick_search_6 }"><i class="fas fa-magnifying-glass fs-4 me-2"></i>K L</a>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="d-grid gap-2">
                                            <a href="#" class="btn btn-primary btn-lg btn-block"
                                               @click.prevent="quickSearch(7)"
                                               v-bind:class="{ 'btn-success': quick_search_7 }"><i class="fas fa-magnifying-glass fs-4 me-2"></i> M N</a>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="d-grid gap-2">
                                            <a href="#" class="btn btn-primary btn-lg btn-block"
                                               @click.prevent="quickSearch(8)" v-bind:class="{ 'btn-success': quick_search_8 }"><i class="fas fa-magnifying-glass fs-4 me-2"></i> O P</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-3">
                                        <div class="d-grid gap-2">
                                            <a href="#" class="btn btn-primary btn-lg btn-block"
                                               @click.prevent="quickSearch(9)"
                                               v-bind:class="{ 'btn-success': quick_search_9 }"><i class="fas fa-magnifying-glass fs-4 me-2"></i> Q R</a>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="d-grid gap-2">
                                            <a href="#" class="btn btn-primary btn-lg btn-block"
                                               @click.prevent="quickSearch(10)"
                                               v-bind:class="{ 'btn-success': quick_search_10 }"><i class="fas fa-magnifying-glass fs-4 me-2"></i>S T</a>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="d-grid gap-2">
                                            <a href="#" class="btn btn-primary btn-lg btn-block"
                                               @click.prevent="quickSearch(11)"
                                               v-bind:class="{ 'btn-success': quick_search_11 }"><i class="fas fa-magnifying-glass fs-4 me-2"></i>U V</a>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="d-grid gap-2">
                                            <a href="#" class="btn btn-primary btn-lg btn-block"
                                               @click.prevent="quickSearch(12)"
                                               v-bind:class="{ 'btn-success': quick_search_12 }"><i class="fas fa-magnifying-glass fs-4 me-2"></i> W X</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-3">
                                        <div class="d-grid gap-2">
                                            <a href="#" class="btn btn-primary btn-lg btn-block"
                                               @click.prevent="quickSearch(13)"
                                               v-bind:class="{ 'btn-success': quick_search_13 }"><i class="fas fa-magnifying-glass fs-4 me-2"></i> Y Z</a>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="d-grid gap-2">
                                            <a href="#" class="btn btn-warning btn-lg btn-block" @click.prevent="clearSearch()"><i class="fas fa-cancel fs-4 me-2"></i> Clear</a>
                                        </div>
                                    </div>

                                </div>


                                <div class="table-responsive mt-3" style="height:650px;overflow:auto;" v-if="filtered_results.length === 0 && category_id === ''">

                                    <table class="table table-borderless table-vertical-center">
                                        <thead>
                                        <tr>
                                            <th class="p-0" style="width: 120px;"></th>
                                            <th class="p-0" style="min-width: 300px"></th>
                                            <th class="p-0" style="min-width: 50px"></th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                            <tr v-cloak v-for="(item, index) in items">
                                                <td class="pl-0 py-4">
                                                    <div class="symbol symbol-lg-100">
                                                        <img v-if="item.image!=null" alt="Pic" v-bind:src="item.image"/>
                                                        <img v-else alt="Pic" src="https://rizetrack.com/assets/dashboard/media/icons/placeholder.jpg">
                                                    </div>
                                                </td>
                                                <td class="pl-0">
                                                    <a class="text-dark fw-bolder text-hover-primary mb-1 font-size-lg">{{ item.name.toUpperCase() }}</a>
                                                    <div>
                                                        <a class="text-muted fw-bolder text-hover-primary" href="#">{{ item.category.name.toUpperCase() }} | SKU: {{ item.sku.toUpperCase() }}</a>
                                                    </div>
                                                    <div>
                                                        <a class="fw-bolder text-hover-primary text-danger" href="#">Kshs {{ item.selling_price }}</a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="#" @click.prevent="selectItem(item)"><i class="fas fa-plus-circle fs-4 me-2 text-warning"></i></a>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>

                                </div>

                                <div class="table-responsive" style="height:650px;overflow:auto;" v-if="filtered_results.length > 0">
                                    <table class="table table-borderless table-vertical-center">
                                        <thead>
                                        <tr>
                                            <th class="p-0" style="width: 120px"></th>
                                            <th class="p-0" style="min-width: 300px"></th>
                                            <th class="p-0" style="min-width: 50px"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-cloak v-for="(item, index) in filtered_results">
                                            <td class="pl-0 py-4">
                                                <div class="symbol symbol-lg-100">
                                                    <img v-if="item.image!=null" alt="Pic" v-bind:src="item.image"/>
                                                    <img v-else alt="Pic" src="https://rizetrack.com/assets/dashboard/media/icons/placeholder.jpg">
                                                </div>
                                            </td>
                                            <td class="pl-0">
                                                <a class="text-dark fw-bolder text-hover-primary mb-1 font-size-lg">{{ item.name.toUpperCase() }}</a>
                                                <div>
                                                    <a class="text-muted fw-bolder text-hover-primary" href="#">{{ item.category.name.toUpperCase() }} | SKU: {{ item.sku.toUpperCase() }}</a>
                                                </div>
                                                <div>
                                                    <a class="fw-bolder text-hover-primary text-danger" href="#">Kshs {{ item.selling_price }}</a>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#" @click.prevent="selectItem(item)"><i class="fas fa-plus-circle fs-4 me-2 text-warning"></i></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <!--end::Card-->

                        </div>

                    </div>

                    <div class="col-5">

                        <!--begin::Card-->
                        <div class="card card-custom" style="height: 700px;">

                            <div class="card-body">

                                <div class="table-responsive" style="height:550px;overflow:auto;">
                                    <table class="table table-borderless table-vertical-center">
                                        <thead>
                                        <tr>
                                            <th class="p-0" style="width: 100px"></th>
                                            <th class="p-0" style="min-width: 250px"></th>
                                            <th class="p-0" style="min-width: 100px"></th>
                                            <th class="p-0" style="min-width: 500px"></th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr v-cloak v-for="(item, index) in cart_items">
                                            <td class="pl-0 py-4">
                                                <div class="symbol symbol-lg-60">
                                                    <img v-if="item.image!=null" alt="Pic" v-bind:src="item.image"/>
                                                    <img v-else alt="Pic" src="https://rizetrack.com/assets/dashboard/media/icons/placeholder.jpg">
                                                </div>
                                            </td>
                                            <td class="pl-0">
                                                <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 font-size-lg">{{ item.name.toUpperCase() }}</a>
                                                <div>
                                                    <a class="text-muted fw-bolder text-hover-primary" href="#">SKU: {{ item.sku.toUpperCase() }}</a>
                                                </div>
                                                <div>
                                                    <a class="fw-bolder text-hover-primary text-danger" href="#">Kshs {{ item.selling_price }}</a>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="text-dark fw-bolder d-block font-size-lg">{{ item.selling_price * item.cart_quantity }}</span>
                                                <span class="text-muted fw-bolder">Qty ({{ item.cart_quantity }})</span>
                                            </td>
                                            <td>
                                                <a href="#" @click.prevent="editCartItem(item)"><i class="fas fa-pen-to-square fs-4 me-2 text-danger"></i></a>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>

                                </div>


                            </div>
                        </div>
                        <!--end::Card-->

                        <!--begin::Card-->
                        <div class="card card-custom" style="margin-top: 13px;">

                            <div class="card-body">

                                <div class="row mb-3">

                                    <div class="col-12">
                                                <span v-cloak class="text-dark fw-bolder d-block fs-1">
                                                    Kshs {{ cart_total }}
                                                </span>

                                        <span v-cloak class="text-muted fw-bolder">
                                                    {{ cart_count }} Item(s)
                                                    <span class="text-danger" v-if="customer !== null"><a href="#" data-bs-toggle="modal" data-bs-target="#kt_modal_complete_sale">(Customer - {{ customer.first_name }} {{ customer.last_name }})</a></span>
                                                    <span class="text-danger" v-else><a href="#" data-bs-toggle="modal" data-bs-target="#kt_modal_complete_sale">(Customer - None)</a></span>
                                                </span>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-6">

                                        <div class="d-grid gap-2">
                                            <!--begin::Export-->
                                            <button type="button" class="btn btn-danger" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                                                OTHER OPTIONS
                                            </button>
                                            <!--end::Export-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a :href="base_url_web_dashboard + '/customers'" target="_blank" class="menu-link px-3">Add Customer</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3" @click.prevent="createNewSale()">Cancel</a>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="d-grid gap-2">
                                            <a href="#" class="btn btn-info" @click.prevent="openCompleteSaleModal()"><i class="fas fa-cart-plus fs-4 me-2"></i>  COMPLETE SALE</a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!--end::Card-->


                    </div>

                </div>

                <!--begin::Modal Search Filter-->
                <div class="modal fade" id="kt_modal_search_filter" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog modal-xl">
                        <!--begin::Modal content-->
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title">Filter Results</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <div class="row row-cols-1 row-cols-md-6 g-4 p-5">
                                    <div class="col" v-cloak v-for="(item, index) in hotkey_filtered_results">
                                        <div class="card border-primary mb-3 rounded-0" style="width: 10rem;" @click.prevent="selectItem(item)">
                                            <img v-if="item.image === ''" src="https://rizetrack.com/assets/dashboard/media/icons/placeholder.jpg" class="card-img-top">
                                            <img v-else :src="item.image" class="card-img-top">
                                            <div class="card-body p-0 m-0">
                                                <p class="card-text mt-2">
                                                    <a href="#" class="text-dark fw-bolder text-hover-primary mb-1">{{ item.name.toUpperCase() }}</a><br>
                                                    <span class="fw-bolder text-hover-primary text-danger">Kshs {{ item.selling_price }}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>
                <!--end::Modal Search Filter-->

                <!--begin::Modal Edit Item-->
                <div class="modal fade" id="kt_modal_item_edit" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Form-->
                            <form class="form" action="#" id="kt_modal_edit_employee_form" @submit.prevent="formSubmitCartEdit" method="post">
                                <!--begin::Modal header-->
                                <div class="modal-header" id="kt_modal_edit_employee_header">
                                    <!--begin::Modal title-->
                                    <h2 class="fw-bold">Edit Item</h2>
                                    <!--end::Modal title-->
                                </div>
                                <!--end::Modal header-->
                                <!--begin::Modal body-->
                                <div class="modal-body py-10 px-lg-17">
                                    <!--begin::Scroll-->
                                    <div class="scroll-y me-n7 pe-7" id="kt_modal_edit_employee_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_edit_employee_header" data-kt-scroll-wrappers="#kt_modal_edit_employee_scroll" data-kt-scroll-offset="300px">

                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold mb-2">Name</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" v-model="cart_item_name" disabled/>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold mb-2">Price</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input class="form-control form-control-solid" type="number" step="any" min="0" v-model="cart_item_selling_price"/>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold mb-2">Quantity</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input class="form-control form-control-solid" type="number" step="any" min="0" v-model="cart_item_cart_quantity"/>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->

                                    </div>
                                    <!--end::Scroll-->
                                </div>
                                <!--end::Modal body-->
                                <div class="d-flex justify-content-center mb-8" v-if="loader">
                                    <div class="spinner-border text-warning" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                                <!--begin::Modal footer-->
                                <div class="modal-footer flex-center">
                                    <!--begin::Button-->
                                    <button type="button" class="btn btn-danger me-3" @click.prevent="removeCartItem()">Delete</button>
                                    <!--end::Button-->
                                    <!--begin::Button-->
                                    <button type="submit" id="kt_modal_edit_employee_submit" class="btn btn-primary">
                                        <span class="indicator-label">Edit Item</span>
                                        <span class="indicator-progress">Please wait...<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                    <!--end::Button-->
                                </div>
                                <!--end::Modal footer-->
                            </form>
                            <!--end::Form-->
                        </div>
                    </div>
                </div>
                <!--end::Modal Edit Item-->

                <!--begin::Modal Search Filter-->
                <div class="modal fade" id="kt_modal_complete_sale" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog modal-xl">
                        <!--begin::Modal content-->

                        <form @submit.prevent="formSubmitSaleForm" method="post" v-if="business !== null">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title">SALES SUMMARY</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">

                                    <div class="row mt-6 mb-3" style="border-bottom: 1px solid #cdcdcd;">

                                        <div class="col-6">
                                            <div class="form-group row">
                                                <label class="col-3 col-form-label"><b>SUB AMOUNT</b></label>
                                                <div class="col-9">
                                                    <label class="col-form-label"><b>{{ Number(cart_total - (vat_tax_total + catering_levy_total)).toFixed(2) }}</b></label>
                                                </div>
                                            </div>

                                            <div class="form-group row" v-if="business.tax_obligation === 1">
                                                <label class="col-3 col-form-label"><b>VAT TAX</b></label>
                                                <div class="col-9">
                                                    <label class="col-form-label"><b>{{ Number(vat_tax_total).toFixed(2) }}</b></label>
                                                </div>
                                            </div>

                                            <div class="form-group row" v-if="business.catering_levy === 1">
                                                <label class="col-3 col-form-label"><b>Catering Levy Tax</b></label>
                                                <div class="col-9">
                                                    <label class="col-form-label"><b>{{ Number(catering_levy_total).toFixed(2) }}</b></label>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-3 col-form-label"><b>TOTAL AMOUNT</b></label>
                                                <div class="col-9">
                                                    <label class="col-form-label"><b>{{ cart_total }}</b></label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-6">
                                            <div class="form-group row">
                                                <label class="col-3 col-form-label"><b>CUSTOMER</b></label>
                                                <div class="col-9">
                                                    <select class="form-control" style="background: #e8e8e8;" v-model="customer">
                                                        <option value="">Select Customer</option>
                                                        <option v-for="(customer) in customers" :value="customer">
                                                            {{ customer.first_name }} {{ customer.last_name }} ({{ customer.phone_number }})
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row mt-3">
                                                <label class="col-3 col-form-label"><b>NOTES</b></label>
                                                <div class="col-9">
                                                    <input class="form-control" style="background: #e8e8e8;" type="text"
                                                           value="Enter notes" v-model="notes"/>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row mt-6">

                                        <div class="col-12">
                                            <label class="col-6 col-form-label"><b>SELECT PAYMENT METHOD</b>
                                                <span v-if="payment_method !== ''" class="text-danger"><b> ({{ payment_method.toUpperCase() }})</b></span>
                                            </label>
                                        </div>

                                    </div>

                                    <div class="row mt-6">

                                        <div class="col">
                                            <a href="#" class="card bg-success hoverable card-xl-stretch mb-5 mb-xl-8" @click.prevent="selectPaymentMethod('cash')">
                                                <!--begin::Body-->
                                                <div class="card-body">
                                                    <i class="ki-duotone ki-wallet text-dark fs-1 ms-n1">
                                                        <i class="path1"></i>
                                                        <i class="path2"></i>
                                                        <i class="path3"></i>
                                                        <i class="path4"></i>
                                                    </i>
                                                    <div class="text-dark fw-bold fs-2 mb-2 mt-5">Cash</div>
                                                </div>
                                                <!--end::Body-->
                                            </a>
                                        </div>

                                        <div class="col">
                                            <a href="#" class="card bg-warning hoverable card-xl-stretch mb-5 mb-xl-8" @click.prevent="selectPaymentMethod('mpesa')">
                                                <!--begin::Body-->
                                                <div class="card-body">
                                                    <i class="ki-duotone ki-screen text-dark fs-2x ms-n1">
                                                        <i class="path1"></i>
                                                        <i class="path2"></i>
                                                        <i class="path3"></i>
                                                        <i class="path4"></i>
                                                    </i>
                                                    <div class="text-dark fw-bold fs-2 mb-2 mt-5">Mpesa</div>
                                                </div>
                                                <!--end::Body-->
                                            </a>
                                        </div>

                                        <div class="col">
                                            <a href="#" class="card bg-info hoverable card-xl-stretch mb-5 mb-xl-8" @click.prevent="selectPaymentMethod('card')">
                                                <!--begin::Body-->
                                                <div class="card-body">
                                                    <i class="ki-duotone ki-two-credit-cart text-white fs-2x ms-n1">
                                                        <i class="path1"></i>
                                                        <i class="path2"></i>
                                                        <i class="path3"></i>
                                                        <i class="path4"></i>
                                                        <i class="path5"></i>
                                                    </i>
                                                    <div class="text-white fw-bold fs-2 mb-2 mt-5">Card</div>
                                                </div>
                                                <!--end::Body-->
                                            </a>
                                        </div>

                                        <div class="col">
                                            <a href="#" class="card bg-primary hoverable card-xl-stretch mb-5 mb-xl-8" @click.prevent="business.license_type === 'premium' ? selectPaymentMethod('credit') : showUpgradeAlert()">
                                                <!--begin::Body-->
                                                <div class="card-body">
                                                    <i class="ki-duotone ki-office-bag text-white fs-2x ms-n1">
                                                        <i class="path1"></i>
                                                        <i class="path2"></i>
                                                        <i class="path3"></i>
                                                        <i class="path4"></i>
                                                    </i>
                                                    <div class="text-white fw-bold fs-2 mb-2 mt-5">Credit</div>
                                                </div>
                                                <!--end::Body-->
                                            </a>
                                        </div>

                                        <div class="col">
                                            <a href="#" class="card bg-dark hoverable card-xl-stretch mb-5 mb-xl-8" @click.prevent="business.license_type === 'premium' ? selectPaymentMethod('installment') : showUpgradeAlert()">
                                                <!--begin::Body-->
                                                <div class="card-body">
                                                    <i class="ki-duotone ki-save-deposit text-white fs-2x ms-n1">
                                                        <i class="path1"></i>
                                                        <i class="path2"></i>
                                                        <i class="path3"></i>
                                                        <i class="path4"></i>
                                                    </i>
                                                    <div class="text-white fw-bold fs-2 mb-2 mt-5">Installment</div>
                                                </div>
                                                <!--end::Body-->
                                            </a>
                                        </div>

                                        <div class="col">
                                            <a href="#" class="card bg-danger hoverable card-xl-stretch mb-5 mb-xl-8" @click.prevent="selectPaymentMethod('pending')">
                                                <!--begin::Body-->
                                                <div class="card-body">
                                                    <i class="ki-duotone ki-price-tag text-white fs-2x ms-n1">
                                                        <i class="path1"></i>
                                                        <i class="path2"></i>
                                                        <i class="path3"></i>
                                                    </i>
                                                    <div class="text-white fw-bold fs-2 mb-2 mt-5">Pending</div>
                                                </div>
                                                <!--end::Body-->
                                            </a>
                                        </div>

                                    </div>

                                    <div class="row mt-6">

                                        <div class="col-5">

                                        </div>

                                        <div class="col-7">

                                            <div class="form-group row mb-3" v-if="payment_method === 'mpesa'">
                                                <label class="col-3 col-form-label"><b>MPESA REFERENCE</b></label>
                                                <div class="col-9">
                                                    <input class="form-control" style="background: #e8e8e8;" type="text"
                                                           placeholder="Enter mpesa reference" v-model="mpesa_reference"/>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3" v-if="payment_method === 'card'">
                                                <label class="col-3 col-form-label"><b>CARD REFERENCE</b></label>
                                                <div class="col-9">
                                                    <input class="form-control" style="background: #e8e8e8;" type="text"
                                                           placeholder="Enter card reference" v-model="card_reference"/>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3" v-if="payment_method === 'cash'">
                                                <label class="col-3 col-form-label"><b>AMOUNT TENDERED</b></label>
                                                <div class="col-9">
                                                    <input class="form-control" style="background: #e8e8e8;" type="number"
                                                           placeholder="Enter amount tendered" v-model="amount_tendered"/>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3" v-if="payment_method === 'installment'">
                                                <label class="col-3 col-form-label"><b>DEPOSIT AMOUNT</b></label>
                                                <div class="col-9">
                                                    <input class="form-control" style="background: #e8e8e8;" type="number"
                                                           placeholder="Enter deposit amount" v-model="installment_amount"/>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Complete Sale</button>
                                    <div class="spinner-border text-warning" role="status" v-if="loader">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                <!--end::Modal Search Filter-->

                <!--begin::Modal Search Filter-->
                <div class="modal fade" id="kt_modal_pending_sale" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog modal-xl">
                        <!--begin::Modal content-->

                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title">PENDING SALES</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">

                                <div class="table-responsive">

                                    <table class="table table-bordered table-striped table-sm">
                                        <thead>
                                        <tr class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
                                            <th>No</th>
                                            <th>Receipt No</th>
                                            <th>Amount</th>
                                            <th>Customer</th>
                                            <th>Sold By</th>
                                            <th>Notes</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-cloak v-for="(sale, index) in pending_sales" :key="sale.id">
                                            <td>No. {{ index + 1 }}</td>
                                            <td><a href="#"><b>{{ sale.receipt_no }}</b></a></td>
                                            <td>{{ sale.amount }}</td>
                                            <td>{{ sale.customer ? `${sale.customer.first_name} ${sale.customer.last_name}` : '-' }}</td>
                                            <td>{{ sale.user ? `${sale.user.first_name} ${sale.user.last_name}` : '-' }}</td>
                                            <td>{{ sale.notes }}</td>
                                            <td>{{ sale.created_at }}</td>
                                            <td><a href="#" @click.prevent="selectPendingSale(sale)"><b>Load Sale</b></a></td>
                                        </tr>

                                        </tbody>
                                    </table>

                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>
                <!--end::Modal Search Filter-->

                <div id="receipt-area" class="receipt-area" style="display: none; width: 80mm; font-size: 10px;" v-if="receipt_details !== null">

                    <section style="margin-top: 15px;">
                        <p class="receipt-title" style="font-size: 11px;">{{ receipt_details.business.name.toUpperCase() }}</p>
                        <p class="contact-info" style="font-size: 11px;">Phone Number: {{ receipt_details.business.phone_number }}</p>
                        <p class="contact-info" style="font-size: 11px;">Email: {{ receipt_details.business.email.toLowerCase() }}</p>
                        <p class="contact-info" style="font-size: 11px;">Receipt No: {{ receipt_details.receipt_no }}</p>
                    </section>

                    <table class="items">
                        <thead>
                        <tr>
                            <th class="heading name"><b>Item</b></th>
                            <th class="heading qty"><b>Qty</b></th>
                            <th class="heading rate"><b>Rate</b></th>
                            <th class="heading amount"><b>Amount</b></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(sale_item, index) in receipt_details.sale_items">
                            <td style="width: 47%; font-size: 11px;">{{ sale_item.item.name }}</td>
                            <td style="width: 5%; font-size: 11px;">{{ sale_item.quantity }}</td>
                            <td class="price" style="width: 20%; font-size: 11px;">{{ sale_item.price }}</td>
                            <td class="price" style="width: 25%; font-size: 11px;">{{ sale_item.total_amount }}</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="sum-up line" style="font-size: 11px;">Subtotal</td>
                            <td class="line price" style="font-size: 11px;">{{ receipt_details.amount - (receipt_details.total_tax + receipt_details.total_catering_levy) }}</td>
                        </tr>
                        <tr v-if="receipt_details.business.tax_obligation === 1">
                            <td colspan="3" class="sum-up" style="font-size: 11px;">VAT ({{ business.vat_rate }}%)</td>
                            <td class="price" style="font-size: 11px;">{{ receipt_details.vat_tax }}</td>
                        </tr>
                        <tr v-if="receipt_details.business.catering_levy === 1">
                            <td colspan="3" class="sum-up" style="font-size: 11px;">Catering Tax ({{ business.catering_levy_rate }}%)</td>
                            <td class="price" style="font-size: 11px;">{{ receipt_details.catering_levy }}</td>
                        </tr>
                        <tr>
                            <th colspan="3" class="total text" style="font-size: 11px;"><b>Total (Kes)</b></th>
                            <th class="total price" style="font-size: 11px;"><b>{{ receipt_details.amount }}</b></th>
                        </tr>
                        <!-- Rest of the table rows -->
                        </tbody>
                    </table>

                    <table class="bill-details">
                        <tbody>
                        <tr>
                            <td style="font-size: 11px;"><b>Paid by : <span>{{ receipt_details.payment_method.toUpperCase() }}</span></b></td>
                            <td style="font-size: 11px;"><b>Served by : <span>{{ receipt_details.user.first_name.toUpperCase() }} {{ receipt_details.user.last_name.toUpperCase() }}</span></b></td>
                        </tr>
                        </tbody>
                    </table>

                    <section class="footer-details">
                        <p style="font-size: 11px;">{{ business.receipt_notes }}</p>
                    </section>

                    <section class="footer-details">
                        <p style="font-size: 11px;">Powered by Rizetrack</p>
                    </section>
                </div>

            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->



    </div>

</template>

<script>
import UtilsMixin from "../../mixins/UtilsMixin.js";
import printJS from 'print-js';

export default {

        mixins: [UtilsMixin],

        created() {
            this.fetchAuthDetails();
            this.fetchCategories();
            this.fetchCustomers();
            this.fetchItems();
        },

        mounted() {
            this.setupModals();
            this.initiateTimeout();
        },

        beforeDestroy() {
            this.destroyTimeout();
        },


        data() {
            return {
                user_name: '',
                catering_levy: '',
                printer_size: '',
                password: '',

                category_id: '',
                category_name: '',
                scan_mode: false,
                search_query: '',
                categories: [],
                items: [],
                filtered_results: [],
                hotkey_filtered_results: [],
                cart_items: [],
                sale_items: [],
                customers: [],
                pending_sales: [],
                customer: null,
                pending_sale: null,
                receipt_details: null,

                cart_item: null,
                cart_item_id: '',
                cart_item_type: '',
                cart_item_name: '',
                cart_item_selling_price: '',
                cart_item_quantity: '',
                cart_item_cart_quantity: '',

                payment_method: '',
                amount_tendered: '',
                installment_amount: '',
                mpesa_reference: '',
                card_reference: '',
                notes: '',

                cart_total: 0,
                vat_tax_total: 0,
                catering_levy_total: 0,
                cart_count: 0,

                is_loading_category: false,
                is_loading_customer: false,
                is_loading_item: false,

                quick_search_1: false,
                quick_search_2: false,
                quick_search_3: false,
                quick_search_4: false,
                quick_search_5: false,
                quick_search_6: false,
                quick_search_7: false,
                quick_search_8: false,
                quick_search_9: false,
                quick_search_10: false,
                quick_search_11: false,
                quick_search_12: false,
                quick_search_13: false,

                request_active: false,

                modal_search_filter: null,
                modal_item_edit: null,
                modal_complete_sale: null,
                modal_pending_sale: null,

              
            }
        },

        methods: {

            fetchCategories() {

                const vm = this;
                const formData = new FormData();
                formData.append('business_id', vm.business_id);

                let uri =  `/category-list`;
                axios.post(uri, formData, {
                    headers: {
                        'Authorization': `Bearer ${vm.api_token}`
                    }
                }).then(function (response) {
                    vm.categories = response.data;
                });

            },

            fetchCustomers() {

                const vm = this;
                const formData = new FormData();
                formData.append('business_id', vm.business_id);

                let uri = base_url + `/customer-list`;
                axios.post(uri, formData, {
                    headers: {
                        'Authorization': `Bearer ${vm.api_token}`
                    }
                }).then(function (response) {
                    vm.customers = response.data;
                });

            },

            fetchItems() {

                const vm = this;
                const formData = new FormData();
                formData.append('business_id', vm.business_id);

                let uri = base_url + `/item-list`;
                axios.post(uri, formData, {
                    headers: {
                        'Authorization': `Bearer ${vm.api_token}`
                    }
                }).then(function (response) {
                    vm.items = response.data;
                });

            },

            fetchPendingSales() {

                const vm = this;
                vm.openPendingModal();

                const formData = new FormData();
                formData.append('business_id', vm.business_id);

                let uri = base_url + `/pending-sale-history`;
                axios.post(uri, formData, {
                    headers: {
                        'Authorization': `Bearer ${vm.api_token}`
                    }
                }).then(function (response) {
                    vm.pending_sales = response.data;
                });

            },

            selectPendingSale(sale) {

                const vm = this;
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This action will discard current sale activity!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, continue!'

                }).then((result) => {
                    if (result.isConfirmed) {

                        vm.loader = false;
                        vm.category_name = "";
                        vm.search_query = "";
                        vm.filtered_results = [];
                        vm.cart_items = [];
                        vm.sale_items = [];
                        vm.receipt_details = null;
                        vm.customer = null;
                        vm.pending_sales = [];
                        vm.pending_sale = null;

                        vm.cart_item = null;
                        vm.cart_item_id = "";
                        vm.cart_item_type = "";
                        vm.cart_item_name = "";
                        vm.cart_item_selling_price = "";
                        vm.cart_item_quantity = "";
                        vm.cart_item_cart_quantity = "";

                        vm.payment_method = "";
                        vm.amount_tendered = "";
                        vm.mpesa_reference = "";
                        vm.card_reference = "";
                        vm.notes = "";

                        vm.cart_total = 0;
                        vm.cart_count = 0;
                        vm.pending_sale = sale;


                        const formData = new FormData();
                        formData.append('sale_id', vm.pending_sale.id);

                        let uri = base_url + `/sale-item-list`;
                        axios.post(uri, formData, {
                            headers: {
                                'Authorization': `Bearer ${vm.api_token}`
                            }
                        }).then(function (response) {

                            var sale_items = response.data;
                            for (var i = 0; i < sale_items.length; i++) {
                                sale_items[i].item.cart_quantity = sale_items[i].quantity;
                                vm.cart_items.push(sale_items[i].item);
                            }

                            vm.getCartTotal();
                        });


                    }
                })

            },

            filterCategories(category) {

                this.category_name = category.name;
                this.category_id = category.id;
                this.filtered_results = [];
                for (var i = 0; i < this.items.length; i++) {
                    if (this.items[i].category_id === category.id) {
                        this.filtered_results.push(this.items[i]);
                    }
                }

            },

            clearCategories(category) {
                this.category_id = '';
                this.category_name = '';
                this.filtered_results = [];
            },

            createNewSale() {

                const vm = this;
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This action will discard current sale activity!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, continue!'

                }).then((result) => {
                    if (result.isConfirmed) {

                        vm.loader = false;
                        vm.category_name = "";
                        vm.search_query = "";
                        vm.filtered_results = [];
                        vm.cart_items = [];
                        vm.sale_items = [];
                        vm.receipt_details = null;
                        vm.customer = null;
                        vm.pending_sales = [];
                        vm.pending_sale = null;

                        vm.cart_item = null;
                        vm.cart_item_id = "";
                        vm.cart_item_type = "";
                        vm.cart_item_name = "";
                        vm.cart_item_selling_price = "";
                        vm.cart_item_quantity = "";
                        vm.cart_item_cart_quantity = "";

                        vm.payment_method = "";
                        vm.amount_tendered = "";
                        vm.mpesa_reference = "";
                        vm.card_reference = "";
                        vm.notes = "";

                        vm.cart_total = 0;
                        vm.cart_count = 0;

                    }
                })
            },

            parseBarcode() {
                for (var i = 0; i < this.items.length; i++) {
                    if (this.items[i].barcode !== null && this.items[i].barcode.includes(this.search_query)) {
                        this.selectItem(this.items[i]);
                        this.search_query = '';
                        return;
                    }
                }
            },

            quickSearch(no) {

                if (no === 1) {

                    alertify.success('AB selected');
                    this.clearFilter();
                    this.filterHotKeys("A");
                    this.filterHotKeys("B");
                    this.quick_search_1 = true;
                    this.modal_search_filter.show();

                } else if (no === 2) {

                    alertify.success('CD selected');
                    this.clearFilter();
                    this.filterHotKeys("C");
                    this.filterHotKeys("D");
                    this.quick_search_2 = true;
                    this.modal_search_filter.show();

                } else if (no === 3) {

                    alertify.success('EF selected');
                    this.clearFilter();
                    this.filterHotKeys("E");
                    this.filterHotKeys("F");
                    this.quick_search_3 = true;
                    this.modal_search_filter.show();

                } else if (no === 4) {

                    alertify.success('GH selected');
                    this.clearFilter();
                    this.filterHotKeys("G");
                    this.filterHotKeys("H");
                    this.quick_search_4 = true;
                    this.modal_search_filter.show();

                } else if (no === 5) {

                    alertify.success('IJ selected');
                    this.clearFilter();
                    this.filterHotKeys("I");
                    this.filterHotKeys("J");
                    this.quick_search_5 = true;
                    this.modal_search_filter.show();

                } else if (no === 6) {

                    alertify.success('KL selected');
                    this.clearFilter();
                    this.filterHotKeys("K");
                    this.filterHotKeys("L");
                    this.quick_search_6 = true;
                    this.modal_search_filter.show();

                } else if (no === 7) {

                    alertify.success('MN selected');
                    this.clearFilter();
                    this.filterHotKeys("M");
                    this.filterHotKeys("N");
                    this.quick_search_7 = true;
                    this.modal_search_filter.show();

                } else if (no === 8) {

                    alertify.success('OP selected');
                    this.clearFilter();
                    this.filterHotKeys("O");
                    this.filterHotKeys("P");
                    this.quick_search_8 = true;
                    this.modal_search_filter.show();

                } else if (no === 9) {

                    alertify.success('QR selected');
                    this.clearFilter();
                    this.filterHotKeys("Q");
                    this.filterHotKeys("R");
                    this.quick_search_9 = true;
                    this.modal_search_filter.show();

                } else if (no === 10) {

                    alertify.success('ST selected');
                    this.clearFilter();
                    this.filterHotKeys("S");
                    this.filterHotKeys("T");
                    this.quick_search_10 = true;
                    this.modal_search_filter.show();

                } else if (no === 11) {

                    alertify.success('UV selected');
                    this.clearFilter();
                    this.filterHotKeys("U");
                    this.filterHotKeys("V");
                    this.quick_search_11 = true;
                    this.modal_search_filter.show();

                } else if (no === 12) {

                    alertify.success('WX selected');
                    this.clearFilter();
                    this.filterHotKeys("W");
                    this.filterHotKeys("X");
                    this.quick_search_12 = true;
                    this.modal_search_filter.show();

                } else if (no === 13) {

                    alertify.success('YZ selected');
                    this.clearFilter();
                    this.filterHotKeys("Y");
                    this.filterHotKeys("Z");
                    this.quick_search_13 = true;
                    this.modal_search_filter.show();

                }
            },

            clearSearch() {
                this.category_id = '';
                this.category_name = '';
                this.filtered_results = [];
                this.hotkey_filtered_results = [];
                this.quick_search_1 = false;
                this.quick_search_2 = false;
                this.quick_search_3 = false;
                this.quick_search_4 = false;
                this.quick_search_5 = false;
                this.quick_search_6 = false;
                this.quick_search_7 = false;
                this.quick_search_8 = false;
                this.quick_search_9 = false;
                this.quick_search_10 = false;
                this.quick_search_11 = false;
                this.quick_search_12 = false;
                this.quick_search_13 = false;
            },

            clearFilter() {
                this.hotkey_filtered_results = [];
                this.quick_search_1 = false;
                this.quick_search_2 = false;
                this.quick_search_3 = false;
                this.quick_search_4 = false;
                this.quick_search_5 = false;
                this.quick_search_6 = false;
                this.quick_search_7 = false;
                this.quick_search_8 = false;
                this.quick_search_9 = false;
                this.quick_search_10 = false;
                this.quick_search_11 = false;
                this.quick_search_12 = false;
                this.quick_search_13 = false;
            },

            filterHotKeys(val) {

                if (this.scan_mode === false) {

                    for (var i = 0; i < this.items.length; i++) {

                        if (this.category_id === '') {
                            if (this.items[i].name.toLowerCase().startsWith(val.toLowerCase())) {
                                this.hotkey_filtered_results.push(this.items[i]);
                            }
                        } else {
                            if (this.items[i].name.toLowerCase().startsWith(val.toLowerCase())) {
                                if (this.items[i].category_id === this.category_id) {
                                    this.hotkey_filtered_results.push(this.items[i]);
                                }
                            }
                        }


                    }

                }
            },

            selectItem(item) {

                const vm = this;
                if (item.track_inventory === 1 && item.item_type === 'product') {

                    if (item.quantity === 0) {
                        alertify.error('No stock available for this product.');
                        return;
                    }
                }

                var exist = false;
                var quantity = 0;
                for (var i = 0; i < vm.cart_items.length; i++) {
                    if (vm.cart_items[i]['id'] === item.id) {
                        quantity = vm.cart_items[i]['cart_quantity'];
                        exist = true;
                    }
                }

                if (exist === false) {
                    item.cart_quantity = 1;
                    vm.cart_items.push(item);
                } else {
                    let cart_item = vm.cart_items.find((object) => {
                        return object.id === item.id;
                    });

                    if (item.item_type === 0) {
                        if (cart_item.cart_quantity >= item.quantity) {
                            alertify.error('Quantity entered more than stock quantity');
                            return;
                        }
                    }

                    cart_item.cart_quantity = Number(quantity) + 1;
                }

                vm.getCartTotal();

                this.modal_search_filter.hide();

            },

            editCartItem(item) {

                this.cart_item = item;
                this.cart_item_id = item.id;
                this.cart_item_name = item.name;
                this.cart_item_type = item.item_type;
                this.cart_item_selling_price = item.selling_price;
                this.cart_item_quantity = item.quantity;
                this.cart_item_cart_quantity = item.cart_quantity;
                this.modal_item_edit.show();

            },

            removeCartItem() {

                var index = this.cart_items.indexOf(this.cart_item);
                this.cart_items.splice(index, 1);

                this.getCartTotal();
                this.closeEditCartItem();
                this.modal_item_edit.hide();

            },

            getCartTotal() {

                const vm = this;
                var total = 0;
                var vat_tax = 0;
                var catering_levy = 0;
                for (var i = 0; i < vm.cart_items.length; i++) {
                    total = total + (vm.cart_items[i]['selling_price'] * vm.cart_items[i]['cart_quantity']);

                    if (vm.business.tax_obligation === 1) {
                        if (vm.cart_items[i]['enable_tax'] === 1 && vm.cart_items[i]['tax_type'] === 'vat') {
                            vat_tax = vat_tax + (vm.business.vat_component * (vm.cart_items[i]['selling_price'] * vm.cart_items[i]['cart_quantity'])).toFixed(2)
                        }
                    }

                    if (vm.business.catering_levy === 1) {
                        var catering_levy_component = (vm.business.catering_levy_rate/(100 + vm.business.catering_levy_rate));
                        catering_levy = catering_levy + (vm.business.catering_levy_component * (vm.cart_items[i]['selling_price'] * vm.cart_items[i]['cart_quantity'])).toFixed(2)
                    }

                }

                vm.cart_total = total;
                vm.vat_tax_total = vat_tax;
                vm.catering_levy_total = catering_levy;
                vm.cart_count = vm.cart_items.length;
                vm.amount_tendered = total;

            },

            closeEditCartItem() {

                this.cart_item = null;
                this.cart_item_id = '';
                this.cart_item_type = '';
                this.cart_item_name = '';
                this.cart_item_selling_price = '';
                this.cart_item_quantity = '';
                this.cart_item_cart_quantity = '';
            },

            formSubmitCartEdit() {

                let cart_item = this.cart_items.find((object) => {
                    return object.id === this.cart_item_id;
                });

                if (this.cart_item_type === 0) {
                    if (this.cart_item_cart_quantity > this.cart_item_quantity) {
                        alertify.error('Quantity entered more than stock quantity');
                        return;
                    }
                }


                cart_item.selling_price = this.cart_item_selling_price;
                cart_item.cart_quantity = this.cart_item_cart_quantity;
                this.getCartTotal();
                this.closeEditCartItem();
                this.modal_item_edit.hide();

            },

            clearFields(){
                this.customer_id = '';
                this.first_name = '';
                this.last_name = '';
                this.email = '';
                this.phone_number = '';
                this.notes = '';
            },

            selectPaymentMethod(payment_method) {
                this.payment_method = payment_method;
            },

            formSubmitSaleForm() {

                const vm = this;
                if (vm.cart_items.length === 0) {
                    alertify.error('No cart items');
                    return;
                }

                const payment_method = vm.payment_method;
                const amount_tendered = vm.amount_tendered;
                let payment_reference = '';
                let installment_amount = vm.installment_amount;
                let payment_status = 'paid';
                let pending_status = false;

                switch (payment_method) {
                    case 'cash':
                        if (!amount_tendered) {
                            alertify.error('Enter amount tendered');
                            return;
                        }
                        if (amount_tendered < vm.cart_total) {
                            alertify.error('Tendered amount less than total amount');
                            return;
                        }
                        break;

                    case 'mpesa':
                        payment_reference = vm.mpesa_reference;
                        if (!payment_reference) {
                            alertify.error('Enter mpesa reference');
                            return;
                        }
                        break;

                    case 'card':
                        payment_reference = vm.card_reference;
                        if (!payment_reference) {
                            alertify.error('Enter card reference');
                            return;
                        }
                        break;

                    case 'credit':
                        if (vm.customer === null) {
                            alertify.error('Select customer');
                            return;
                        }
                        break;

                    case 'installment':
                        if (vm.customer === null) {
                            alertify.error('Select customer');
                            return;
                        }
                        if (!installment_amount) {
                            alertify.error('Enter installment amount');
                            return;
                        }
                        break;

                    case 'pending':
                        pending_status = true;
                        payment_status = 'pending';
                        break;

                    default:
                        alertify.error('Invalid payment method');
                        return;
                }

                vm.loader = true;
                vm.alert_error = false;
                vm.alert_success = false;
                vm.alert_message = '';

                const vatTaxPercentage = vm.business.vat_component;
                const vatTaxTotal = vm.cart_items.reduce(
                    (total, item) =>
                        total + (item.enable_tax === 1 && item.tax_type === 'vat' ? vatTaxPercentage * (item.selling_price * item.cart_quantity) : 0),
                    0
                );

                const cateringLevyTotal = vm.catering_levy === 1 ? vatTaxTotal : 0;

                const sale_items = vm.cart_items.map(item => ({
                    business_id: vm.business_id,
                    item_id: item.id,
                    price: item.selling_price,
                    quantity: item.cart_quantity,
                    total_amount: item.cart_quantity * item.selling_price,
                    vat_tax: item.enable_tax === 1 && item.tax_type === 'vat' ? vatTaxPercentage * (item.selling_price * item.cart_quantity) : 0,
                    catering_levy: vm.catering_levy === 1 ? vatTaxPercentage * (item.selling_price * item.cart_quantity) : 0,
                }));

                const formData = new FormData();
                formData.append('business_id', vm.business_id);
                formData.append('payment_method', payment_method);
                formData.append('amount', vm.cart_total);
                formData.append('amount_received', amount_tendered);
                formData.append('balance', payment_method === 'cash' ? amount_tendered - vm.cart_total : 0);
                formData.append('vat_tax', vatTaxTotal);
                formData.append('catering_levy', cateringLevyTotal);
                formData.append('customer_id', vm.customer ? vm.customer.id : '');
                formData.append('payment_status', payment_status);
                formData.append('pending_status', pending_status);
                formData.append('payment_reference', payment_reference);
                formData.append('installment_amount', installment_amount);
                formData.append('notes', vm.notes);
                formData.append('items', JSON.stringify(sale_items));

                if (vm.pending_sale !== null) {
                    formData.append('id', vm.pending_sale.id);
                }

                const url = base_url + (vm.pending_sale !== null ? `/sale-edit` : `/sale-create`);
                axios.post(url, formData, {
                    headers: {
                        'Authorization': `Bearer ${vm.api_token}`
                    }
                })
                    .then(function (response) {
                        vm.request_active = false;
                        var status = response.data.status;
                        if (status === 'success') {

                            vm.receipt_details = response.data.sale;
                            vm.alert_success = true;
                            vm.loader = false;
                            vm.category_name = "";
                            vm.search_query = "";
                            vm.filtered_results = [];
                            vm.cart_items = [];
                            vm.sale_items = [];
                            vm.customer = null;
                            vm.pending_sale = null;

                            vm.cart_item = null;
                            vm.cart_item_id = "";
                            vm.cart_item_type = "";
                            vm.cart_item_name = "";
                            vm.cart_item_selling_price = "";
                            vm.cart_item_quantity = "";
                            vm.cart_item_cart_quantity = "";

                            vm.payment_method = "";
                            vm.amount_tendered = "";
                            vm.mpesa_reference = "";
                            vm.card_reference = "";

                            vm.cart_total = 0;
                            vm.cart_count = 0;
                            vm.fetchItems();

                            vm.modal_complete_sale.hide();

                            Swal.fire({
                                title: 'Sale recorded, Thanks!',
                                text: "Do you want to print receipt?",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes, print!'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    vm.printComponent();
                                }else{
                                    vm.receipt_details = null;
                                }
                            })


                        } else if (status === 0) {
                            alertify.error('Error creating sale');
                            vm.loader = false;
                            vm.alert_error = true;
                            vm.alert_message = status;
                        }
                    })
                    .catch(function (error) {
                        vm.request_active = false;
                        alertify.error('Error creating sale');
                        console.log(error);
                        vm.loader = false;
                        vm.alert_error = true;
                    });
            },

            setupModals(){
                this.modal_search_filter = new bootstrap.Modal(document.getElementById('kt_modal_search_filter'))
                this.modal_item_edit = new bootstrap.Modal(document.getElementById('kt_modal_item_edit'))
                this.modal_complete_sale = new bootstrap.Modal(document.getElementById('kt_modal_complete_sale'))
                this.modal_pending_sale = new bootstrap.Modal(document.getElementById('kt_modal_pending_sale'))
            },

            openCompleteSaleModal(){
                this.modal_complete_sale.show();
            },

            openPendingModal(){
                this.modal_pending_sale.show();
            },

            showError(message){
                this.loader = false;
                this.alert_error = true;
                this.alert_message = message;
                alertify.error(message);
            },

            clearError(){
                this.alert_error = false;
                this.alert_message = '';
            },

        },

        filters: {
            capitalize: function (value) {
                if (!value) return ''
                value = value.toString()
                return value.toUpperCase()
            }
        },

        watch: {
            search_query: function (val) {
                const vm = this;
                if (this.scan_mode === false) {
                    this.category_name = '';
                    this.filtered_results = this.items.filter(item => item.name.toLowerCase().includes(val.toLowerCase()));
                }
            }
        },

}
</script>

<style scoped>

</style>
