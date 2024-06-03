<template>

    <div class="d-flex flex-column flex-column-fluid">

        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Sales History</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <span class="d-block pt-2 font-size-sm">Displaying {{ sales.length }} search results</span>
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

                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <div class="spinner-border" v-if="loader">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-sale-table-toolbar="base">
                                <!--begin::Filter-->
                                <button type="button" class="btn btn-danger me-3" @click.prevent="openFilterModal()">
                                    <i class="ki-duotone ki-filter fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>Filter</button>
                                <!--end::Filter-->
                                <!--begin::Export-->
                                <button type="button" class="btn btn-success me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                                    <i class="ki-duotone ki-exit-up fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>Export</button>
                                <!--end::Export-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" @click.prevent="business.license_type === 'premium' ? formSubmitReport('excel') : showUpgradeAlert()">Export XLS</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" @click.prevent="formSubmitReport('pdf')">Export PDF</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--begin::Add sale-->
                                <button type="button" class="btn btn-primary" @click.prevent="clearFilters()">Clear Filters </button>
                                <!--end::Add sale-->
                            </div>
                            <!--end::Toolbar-->
                            <!--begin::Group actions-->
                            <div class="d-flex justify-content-end align-items-center d-none" data-kt-sale-table-toolbar="selected">
                                <div class="fw-bold me-5">
                                    <span class="me-2" data-kt-sale-table-select="selected_count"></span>Selected</div>
                                <button type="button" class="btn btn-danger" data-kt-sale-table-select="delete_selected">Delete Selected</button>
                            </div>
                            <!--end::Group actions-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">

                        <div class="table-responsive">

                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                <tr class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
                                    <th>No</th>
                                    <th>Receipt No</th>
                                    <th>Amount</th>
                                    <th>Payment Method</th>
                                    <th>Payment Status</th>
                                    <th>Customer</th>
                                    <th>Sold By</th>
                                    <th>Notes</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-cloak v-for="(sale, index) in sales">
                                    <td>No. {{ index  + 1 }}</td>
                                    <td> <a href="#"><b>{{ sale.receipt_no }}</b></a> </td>
                                    <td> {{ sale.amount }} </td>
                                    <td> {{ sale.payment_method.toUpperCase() }}</td>
                                    <td> {{ sale.payment_status.toUpperCase() }}</td>
                                    <td>{{ sale.customer ? `${sale.customer.first_name} ${sale.customer.last_name}` : '-' }}</td>
                                    <td> {{ sale.user.first_name }} {{ sale.user.last_name }}</td>
                                    <td> {{ sale.notes }}</td>
                                    <td> {{ sale.created_at }}</td>
                                    <td><a href="#" @click.prevent="printReceipt(sale)"><b>Print Receipt</b></a></td>
                                </tr>
                                </tbody>
                            </table>

                             <ul class="pagination pagination-circle">
                                <li class="page-item previous" v-if="pagination.prev_page_url">
                                    <a @click.prevent="fetchReport(pagination.current_page - 1)" class="page-link"><i class="previous"></i></a>
                                </li>
                                <li class="page-item" v-for="page in pagination.last_page" :key="page" :class="{ 'active': page === pagination.current_page }">
                                    <a class="page-link" v-if="page === pagination.current_page" href="#">{{ page }}</a>
                                    <a class="page-link" v-else @click.prevent="fetchReport(page)" href="#">{{ page }}</a>
                                </li>
                                <li class="page-item next" v-if="pagination.next_page_url">
                                    <a @click.prevent="fetchReport(pagination.current_page + 1)" class="page-link"><i class="next"></i></a>
                                </li>
                            </ul>

                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
                <!--begin::Modals-->

                <!--begin::Modal - Expenses - Search-->
                <div class="modal fade" id="kt_modal_filter" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Form-->
                            <form class="form" id="kt_modal_filter_form" @submit.prevent="fetchReport()" method="post">
                                <!--begin::Modal header-->
                                <div class="modal-header" id="kt_modal_filter_header">
                                    <!--begin::Modal title-->
                                    <h2 class="fw-bold">Filter Report</h2>
                                    <!--end::Modal title-->
                                </div>
                                <!--end::Modal header-->
                                <!--begin::Modal body-->
                                <div class="modal-body py-10 px-lg-17">
                                    <!--begin::Scroll-->
                                    <div class="scroll-y me-n7 pe-7" id="kt_modal_filter_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_filter_header" data-kt-scroll-wrappers="#kt_modal_filter_scroll" data-kt-scroll-offset="300px">

                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2">Receipt No</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" v-model="filter_receipt_no"/>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2">Customer</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select class="form-select form-select-solid fw-bold" v-model="filter_customer_id">
                                                <option value=""></option>
                                                <option v-for="customer in customers" :value="customer.id">{{ customer.first_name }} {{ customer.last_name }}</option>
                                            </select>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2">Employee</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select class="form-select form-select-solid fw-bold" v-model="filter_user_id">
                                                <option value=""></option>
                                                <option v-for="employee in employees" :value="employee.id">{{ employee.first_name }} {{ employee.last_name }}</option>
                                            </select>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2">Payment Method</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select class="form-select form-select-solid fw-bold" v-model="filter_payment_method">
                                                <option value=""></option>
                                                <option value="cash">Cash</option>
                                                <option value="credit">Credit</option>
                                                <option value="mpesa">Mpesa</option>
                                                <option value="card">Card</option>
                                                <option value="installment">Installments</option>
                                            </select>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2">Date</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select class="form-select form-select-solid fw-bold" v-model="filter_date">
                                               <option value="">Select Period</option>
                                                <option value="today">Today</option>
                                                <option value="current_week">Current Week</option>
                                                <option value="last_week">Last Week</option>
                                                <option value="current_month">Current Month</option>
                                                <option value="custom_date">Custom Date</option>
                                                <option value="custom_range">Custom Range</option>
                                            </select>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7" v-if="filter_date === 'custom_date'">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2">Custom Date</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="date" class="form-control form-control-solid" v-model="filter_custom_date"/>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7" v-if="filter_date === 'custom_range'">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2">Start Date</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="date" class="form-control form-control-solid" v-model="filter_custom_start_date"/>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7" v-if="filter_date === 'custom_range'">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2">End Date</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="date" class="form-control form-control-solid" v-model="filter_custom_end_date"/>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->

                                    </div>
                                    <!--end::Scroll-->
                                </div>
                                <!--end::Modal body-->
                                <!--begin::Modal footer-->
                                <div class="modal-footer flex-center">
                                    <!--begin::Button-->
                                    <button type="button" data-bs-dismiss="modal" class="btn btn-light me-3">Close</button>
                                    <!--end::Button-->
                                    <!--begin::Button-->
                                    <button type="submit" id="kt_modal_filter_submit" class="btn btn-primary">
                                        <span class="indicator-label">Filter</span>
                                        <span class="indicator-progress">Please wait...
															<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                    <!--end::Button-->
                                </div>
                                <!--end::Modal footer-->
                            </form>
                            <!--end::Form-->
                        </div>
                    </div>
                </div>
                <!--end::Modal - Expenses - Search-->

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
import printJS from "print-js";

export default {

        mixins: [UtilsMixin],

        created() {
            this.fetchAuthDetails();
            this.fetchReport();
            this.fetchEmployees();
            this.fetchCustomers();
        },

        mounted() {
            this.initiateTimeout();
            this.setupModals();
        },

        beforeDestroy() {
            this.destroyTimeout();
        },


        data() {
            return {
                sale: null,
                sales: [],
                employees: [],
                customers: [],
                pagination: {},
                receipt_details: null,

                filter_receipt_no: '',
                filter_payment_method: '',
                filter_customer_id: '',
                filter_user_id: '',
                filter_date: '',
                filter_custom_date: '',
                filter_custom_start_date: '',
                filter_custom_end_date: '',

                modal_filter: null,

                base_url: "https://rizetrack.com/api/v1",
                base_url_web: "https://rizetrack.com",
                base_url_web_dashboard: "https://rizetrack.com/dashboard"
            }
        },

        methods: {

            fetchEmployees() {

                const vm = this;
                const formData = new FormData();
                formData.append('business_id', vm.business_id);

                let uri = base_url + `/employee-list`;
                axios.post(uri, formData, {
                    headers: {
                        'Authorization': `Bearer ${vm.api_token}`
                    }
                }).then(function (response) {
                    vm.employees = response.data;
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

            fetchReport(page) {

                const vm = this;
                vm.loader = true;

                if(vm.filter_date === 'custom_date'){

                    if(vm.filter_custom_date === ''){
                        alertify.error('Enter custom date');
                        vm.loader = false;
                        return;
                    }

                    if(vm.business.license_type === 'free'){

                        const customDate = new Date(vm.filter_custom_date);
                        const currentDate = new Date();

                        const twoMonthsAgo = new Date(currentDate);
                        twoMonthsAgo.setMonth(currentDate.getMonth() - 2);

                        if (customDate < twoMonthsAgo) {
                            vm.showUpgradeAlert();
                            vm.loader = false;
                            return;
                        }

                    }

                }

                if(vm.filter_date === 'custom_range'){

                    if(vm.filter_custom_start_date === ''){
                        alertify.error('Enter start date');
                        vm.loader = false;
                        return;
                    }

                    if(vm.filter_custom_end_date === ''){
                        alertify.error('Enter end date');
                        vm.loader = false;
                        return;
                    }

                    const customStartDate = new Date(vm.filter_custom_start_date);
                    const customEndDate = new Date(vm.filter_custom_end_date);

                    if (customStartDate > customEndDate) {
                        alertify.error('Start date cannot be later than end date');
                        vm.loader = false;
                        return;
                    }

                    const currentDate = new Date();
                    const twoMonthsAgo = new Date(currentDate);
                    twoMonthsAgo.setMonth(currentDate.getMonth() - 2);

                    if (customEndDate < twoMonthsAgo) {
                        vm.showUpgradeAlert();
                        vm.loader = false;
                        return;
                    }

                }

                if (typeof page === 'undefined') {
                    page = 1;
                }

                const formData = new FormData();
                formData.append('business_id', vm.business_id);
                formData.append('receipt_no', vm.filter_receipt_no);
                formData.append('payment_method', vm.filter_payment_method);
                formData.append('customer_id', vm.filter_customer_id);
                formData.append('user_id', vm.filter_user_id);
                formData.append('date', vm.filter_date);
                formData.append('custom_date', vm.filter_custom_date);
                formData.append('custom_start_date', vm.filter_custom_start_date);
                formData.append('custom_end_date', vm.filter_custom_end_date);

                let uri = base_url + '/report-sales-filter?page=' + page;
                axios.post(uri, formData, {
                    headers: {
                        'Authorization': `Bearer ${vm.api_token}`
                    }
                }).then(function (response) {
                    vm.loader = false;
                    vm.sales = response.data.data;
                    vm.pagination = response.data;
                    vm.modal_filter.hide();
                });

            },

            formSubmitReport(file_type) {

                const vm = this;
                vm.loader = true;

                if(vm.sales.length === 0){
                    alertify.error('No reports to download');
                    vm.loader = false;
                    return
                }

                const formData = new FormData();
                formData.append('business_id', vm.business_id);
                formData.append('receipt_no', vm.filter_receipt_no);
                formData.append('payment_method', vm.filter_payment_method);
                formData.append('customer_id', vm.filter_customer_id);
                formData.append('user_id', vm.filter_user_id);
                formData.append('date', vm.filter_date);
                formData.append('custom_date', vm.filter_custom_date);
                formData.append('custom_start_date', vm.filter_custom_start_date);
                formData.append('custom_end_date', vm.filter_custom_end_date);
                formData.append('file_type', file_type);

                let uri = base_url + `/report-sales-download`;
                axios.post(uri, formData, {
                    headers: {
                        'Authorization': `Bearer ${vm.api_token}`
                    },
                    responseType: 'blob',
                }).then(function (response) {
                    vm.loader = false;
                    const fileName = file_type === 'excel' ? 'RIZETRACK-SALES-REPORT.xls' : 'RIZETRACK-SALES-REPORT.pdf';
                    const url = window.URL.createObjectURL(new Blob([response.data]));
                    const link = document.createElement('a');
                    link.href = url;
                    link.setAttribute('download', fileName);
                    document.body.appendChild(link);
                    link.click();
                });

            },

            saleDetails(sale){
               this.sale = sale;
            },

            clearFilters(){
                this.filter_receipt_no = '';
                this.filter_payment_method = '';
                this.filter_customer_id = '';
                this.filter_user_id = '';
                this.filter_date = '';
                this.filter_custom_date = '';
                this.filter_custom_start_date = '';
                this.filter_custom_end_date = '';
                this.fetchReport();
            },

            setupModals(){
                this.modal_filter = new bootstrap.Modal(document.getElementById('kt_modal_filter'));
            },

            openFilterModal(){
                this.modal_filter.show();
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

            printReceipt(val){
                const vm = this;
                vm.receipt_details = val;
                Swal.fire({
                    title: 'Receipt #' + val.receipt_no,
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
            },

        },

}
</script>

<style scoped>

</style>
