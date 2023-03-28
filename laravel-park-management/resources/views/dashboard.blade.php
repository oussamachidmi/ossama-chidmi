@extends('adminlte::page')

@section('title')
    user
@endsection

@section('content_header')
    profil page
@endsection
@section('content')
    {{-- <h3>{{ \App\Models\employe::find(3)->user }}</h3> --}}

    <div class="row">


        {{-- ################################### service ####################################### --}}



        <div class="col-lg-3 col-6">

            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ \App\Models\service::count() }}</h3>
                    <p>gestion des services <br> et employes </p>
                </div>
                <div class="icon">
                    <i class="fa fa-address-book"></i>
                </div>
                <a href="{{ route('showser') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>

            </div>
        </div>

        {{-- ################################### service ####################################### --}}








        <div class="col-lg-3 col-6">

            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ \App\Models\materiel::count() }}</h3>
                    <p>gestion materiels<br>&nbsp;</p>

                </div>
                <div class="icon">
                    <i class="fa fa-window-restore"></i>
                </div>
                <a href="{{ route('modeles') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ \App\Models\type::count() }}</h3>
                    <p>ajouter un type</p>
                </div>
                <div class="icon">
                    <i class="fa fa-plus"></i>
                </div>
                <a href="{{ route('modeles') }}" class="small-box-footer">
                    voir <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>



    </div>

    <div class="row">
        <div class="card bg-gradient-success col mx-10">
            <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">
                    <i class="far fa-calendar-alt"></i>
                    Calendar
                </h3>

                <div class="card-tools">

                    <div class="btn-group">
                        <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"
                            data-offset="-52">
                            <i class="fas fa-bars"></i>
                        </button>
                        <div class="dropdown-menu" role="menu">
                            <a href="#" class="dropdown-item">Add new event</a>
                            <a href="#" class="dropdown-item">Clear events</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">View calendar</a>
                        </div>
                    </div>
                    <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

            </div>

            <div class="card-body pt-0">

                <div id="calendar" style="width: 100%">
                    <div class="bootstrap-datetimepicker-widget usetwentyfour">
                        <ul class="list-unstyled">
                            <li class="show">
                                <div class="datepicker">
                                    <div class="datepicker-days" style="">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th class="prev" data-action="previous"><span
                                                            class="fa fa-chevron-left" title="Previous Month"></span></th>
                                                    <th class="picker-switch" data-action="pickerSwitch" colspan="5"
                                                        title="Select Month">May 2022</th>
                                                    <th class="next" data-action="next"><span
                                                            class="fa fa-chevron-right" title="Next Month"></span></th>
                                                </tr>
                                                <tr>
                                                    <th class="dow">Su</th>
                                                    <th class="dow">Mo</th>
                                                    <th class="dow">Tu</th>
                                                    <th class="dow">We</th>
                                                    <th class="dow">Th</th>
                                                    <th class="dow">Fr</th>
                                                    <th class="dow">Sa</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td data-action="selectDay" data-day="05/01/2022"
                                                        class="day weekend">1</td>
                                                    <td data-action="selectDay" data-day="05/02/2022"
                                                        class="day">2</td>
                                                    <td data-action="selectDay" data-day="05/03/2022"
                                                        class="day">3</td>
                                                    <td data-action="selectDay" data-day="05/04/2022"
                                                        class="day">4</td>
                                                    <td data-action="selectDay" data-day="05/05/2022"
                                                        class="day">5</td>
                                                    <td data-action="selectDay" data-day="05/06/2022"
                                                        class="day">6</td>
                                                    <td data-action="selectDay" data-day="05/07/2022"
                                                        class="day weekend">7</td>
                                                </tr>
                                                <tr>
                                                    <td data-action="selectDay" data-day="05/08/2022"
                                                        class="day weekend">8</td>
                                                    <td data-action="selectDay" data-day="05/09/2022"
                                                        class="day">9</td>
                                                    <td data-action="selectDay" data-day="05/10/2022"
                                                        class="day">10</td>
                                                    <td data-action="selectDay" data-day="05/11/2022"
                                                        class="day">11</td>
                                                    <td data-action="selectDay" data-day="05/12/2022"
                                                        class="day">12</td>
                                                    <td data-action="selectDay" data-day="05/13/2022"
                                                        class="day">13</td>
                                                    <td data-action="selectDay" data-day="05/14/2022"
                                                        class="day weekend">14</td>
                                                </tr>
                                                <tr>
                                                    <td data-action="selectDay" data-day="05/15/2022"
                                                        class="day weekend">15</td>
                                                    <td data-action="selectDay" data-day="05/16/2022"
                                                        class="day">16</td>
                                                    <td data-action="selectDay" data-day="05/17/2022"
                                                        class="day">17</td>
                                                    <td data-action="selectDay" data-day="05/18/2022"
                                                        class="day">18</td>
                                                    <td data-action="selectDay" data-day="05/19/2022"
                                                        class="day">19</td>
                                                    <td data-action="selectDay" data-day="05/20/2022"
                                                        class="day">20</td>
                                                    <td data-action="selectDay" data-day="05/21/2022"
                                                        class="day weekend">21</td>
                                                </tr>
                                                <tr>
                                                    <td data-action="selectDay" data-day="05/22/2022"
                                                        class="day weekend">22</td>
                                                    <td data-action="selectDay" data-day="05/23/2022"
                                                        class="day">23</td>
                                                    <td data-action="selectDay" data-day="05/24/2022"
                                                        class="day">24</td>
                                                    <td data-action="selectDay" data-day="05/25/2022"
                                                        class="day">25</td>
                                                    <td data-action="selectDay" data-day="05/26/2022"
                                                        class="day">26</td>
                                                    <td data-action="selectDay" data-day="05/27/2022"
                                                        class="day">27</td>
                                                    <td data-action="selectDay" data-day="05/28/2022"
                                                        class="day weekend">28</td>
                                                </tr>
                                                <tr>
                                                    <td data-action="selectDay" data-day="05/29/2022"
                                                        class="day active today weekend">29</td>
                                                    <td data-action="selectDay" data-day="05/30/2022"
                                                        class="day">30</td>
                                                    <td data-action="selectDay" data-day="05/31/2022"
                                                        class="day">31</td>
                                                    <td data-action="selectDay" data-day="06/01/2022"
                                                        class="day new">1</td>
                                                    <td data-action="selectDay" data-day="06/02/2022"
                                                        class="day new">2</td>
                                                    <td data-action="selectDay" data-day="06/03/2022"
                                                        class="day new">3</td>
                                                    <td data-action="selectDay" data-day="06/04/2022"
                                                        class="day new weekend">4</td>
                                                </tr>
                                                <tr>
                                                    <td data-action="selectDay" data-day="06/05/2022"
                                                        class="day new weekend">5</td>
                                                    <td data-action="selectDay" data-day="06/06/2022"
                                                        class="day new">6</td>
                                                    <td data-action="selectDay" data-day="06/07/2022"
                                                        class="day new">7</td>
                                                    <td data-action="selectDay" data-day="06/08/2022"
                                                        class="day new">8</td>
                                                    <td data-action="selectDay" data-day="06/09/2022"
                                                        class="day new">9</td>
                                                    <td data-action="selectDay" data-day="06/10/2022"
                                                        class="day new">10</td>
                                                    <td data-action="selectDay" data-day="06/11/2022"
                                                        class="day new weekend">11</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="datepicker-months" style="display: none;">
                                        <table class="table-condensed">
                                            <thead>
                                                <tr>
                                                    <th class="prev" data-action="previous"><span
                                                            class="fa fa-chevron-left" title="Previous Year"></span></th>
                                                    <th class="picker-switch" data-action="pickerSwitch" colspan="5"
                                                        title="Select Year">2022</th>
                                                    <th class="next" data-action="next"><span
                                                            class="fa fa-chevron-right" title="Next Year"></span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="7"><span data-action="selectMonth"
                                                            class="month">Jan</span><span
                                                            data-action="selectMonth"
                                                            class="month">Feb</span><span
                                                            data-action="selectMonth"
                                                            class="month">Mar</span><span
                                                            data-action="selectMonth"
                                                            class="month">Apr</span><span
                                                            data-action="selectMonth"
                                                            class="month active">May</span><span
                                                            data-action="selectMonth"
                                                            class="month">Jun</span><span
                                                            data-action="selectMonth"
                                                            class="month">Jul</span><span
                                                            data-action="selectMonth"
                                                            class="month">Aug</span><span
                                                            data-action="selectMonth"
                                                            class="month">Sep</span><span
                                                            data-action="selectMonth"
                                                            class="month">Oct</span><span
                                                            data-action="selectMonth"
                                                            class="month">Nov</span><span
                                                            data-action="selectMonth" class="month">Dec</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="datepicker-years" style="display: none;">
                                        <table class="table-condensed">
                                            <thead>
                                                <tr>
                                                    <th class="prev" data-action="previous"><span
                                                            class="fa fa-chevron-left" title="Previous Decade"></span></th>
                                                    <th class="picker-switch" data-action="pickerSwitch" colspan="5"
                                                        title="Select Decade">2020-2029</th>
                                                    <th class="next" data-action="next"><span
                                                            class="fa fa-chevron-right" title="Next Decade"></span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="7"><span data-action="selectYear"
                                                            class="year old">2019</span><span
                                                            data-action="selectYear"
                                                            class="year">2020</span><span
                                                            data-action="selectYear"
                                                            class="year">2021</span><span
                                                            data-action="selectYear"
                                                            class="year active">2022</span><span
                                                            data-action="selectYear"
                                                            class="year">2023</span><span
                                                            data-action="selectYear"
                                                            class="year">2024</span><span
                                                            data-action="selectYear"
                                                            class="year">2025</span><span
                                                            data-action="selectYear"
                                                            class="year">2026</span><span
                                                            data-action="selectYear"
                                                            class="year">2027</span><span
                                                            data-action="selectYear"
                                                            class="year">2028</span><span
                                                            data-action="selectYear"
                                                            class="year">2029</span><span
                                                            data-action="selectYear" class="year old">2030</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="datepicker-decades" style="display: none;">
                                        <table class="table-condensed">
                                            <thead>
                                                <tr>
                                                    <th class="prev" data-action="previous"><span
                                                            class="fa fa-chevron-left" title="Previous Century"></span>
                                                    </th>
                                                    <th class="picker-switch" data-action="pickerSwitch" colspan="5">
                                                        2000-2090</th>
                                                    <th class="next" data-action="next"><span
                                                            class="fa fa-chevron-right" title="Next Century"></span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="7"><span data-action="selectDecade" class="decade old"
                                                            data-selection="2006">1990</span><span
                                                            data-action="selectDecade" class="decade"
                                                            data-selection="2006">2000</span><span
                                                            data-action="selectDecade" class="decade"
                                                            data-selection="2016">2010</span><span
                                                            data-action="selectDecade" class="decade active"
                                                            data-selection="2026">2020</span><span
                                                            data-action="selectDecade" class="decade"
                                                            data-selection="2036">2030</span><span
                                                            data-action="selectDecade" class="decade"
                                                            data-selection="2046">2040</span><span
                                                            data-action="selectDecade" class="decade"
                                                            data-selection="2056">2050</span><span
                                                            data-action="selectDecade" class="decade"
                                                            data-selection="2066">2060</span><span
                                                            data-action="selectDecade" class="decade"
                                                            data-selection="2076">2070</span><span
                                                            data-action="selectDecade" class="decade"
                                                            data-selection="2086">2080</span><span
                                                            data-action="selectDecade" class="decade"
                                                            data-selection="2096">2090</span><span
                                                            data-action="selectDecade" class="decade old"
                                                            data-selection="2106">2100</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </li>
                            <li class="picker-switch accordion-toggle"></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <div class="card col ml-5">
            <div class="card-header border-transparent">
                <h3 class="card-title">Latest Orders</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Item</th>
                                <th>Status</th>
                                <th>Popularity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                <td>Call of Duty IV</td>
                                <td><span class="badge badge-success">Shipped</span></td>
                                <td>
                                    <div class="sparkbar" data-color="#00a65a" data-height="20">
                                        90,80,90,-70,61,-83,63</div>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="pages/examples/invoice.html">OR1848</a></td>
                                <td>Samsung Smart TV</td>
                                <td><span class="badge badge-warning">Pending</span></td>
                                <td>
                                    <div class="sparkbar" data-color="#f39c12" data-height="20">
                                        90,80,-90,70,61,-83,68</div>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                <td>iPhone 6 Plus</td>
                                <td><span class="badge badge-danger">Delivered</span></td>
                                <td>
                                    <div class="sparkbar" data-color="#f56954" data-height="20">
                                        90,-80,90,70,-61,83,63</div>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                <td>Samsung Smart TV</td>
                                <td><span class="badge badge-info">Processing</span></td>
                                <td>
                                    <div class="sparkbar" data-color="#00c0ef" data-height="20">
                                        90,80,-90,70,-61,83,63</div>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="pages/examples/invoice.html">OR1848</a></td>
                                <td>Samsung Smart TV</td>
                                <td><span class="badge badge-warning">Pending</span></td>
                                <td>
                                    <div class="sparkbar" data-color="#f39c12" data-height="20">
                                        90,80,-90,70,61,-83,68</div>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                <td>iPhone 6 Plus</td>
                                <td><span class="badge badge-danger">Delivered</span></td>
                                <td>
                                    <div class="sparkbar" data-color="#f56954" data-height="20">
                                        90,-80,90,70,-61,83,63</div>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                <td>Call of Duty IV</td>
                                <td><span class="badge badge-success">Shipped</span></td>
                                <td>
                                    <div class="sparkbar" data-color="#00a65a" data-height="20">
                                        90,80,90,-70,61,-83,63</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

            <div class="card-footer clearfix">
                <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
            </div>

        </div>

    </div>

    <div id="node"></div>
<script>
    window.systemeInformation = require('systeminformation');
 // promises style - new since version 3
   si.cpu()
    .then(data => console.log(data))
    .catch(error => console.error(error));
</script>
@endsection
