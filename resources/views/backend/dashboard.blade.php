@extends('backend.layouts.app')

@section('title', __('Dashboard'))
@push('after-styles')
    {{-- {{style('assets/core_ui/css/style.css')}} --}}
    <style>

    .grid:after {
        content: '';
        display: block;
        clear: both;
    }
    .grid-item {
        width: 153px;
        float: left;
    }
    </style>
@endpush
@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Welcome :Name', ['name' => $logged_in_user->name])
        </x-slot>

        <x-slot name="body">
            {{-- @lang('Welcome to the Dashboard') --}}
            <div class="content">
            	<div class="container-fluid">
                    <div class="grid" >

                    <?php
                        $color = 0;
                        $colors = rand_color();
                    ?>
                    @if($logged_in_user->hasAllAccess())
                        <!-- Small boxes (Stat box) -->
                        <div class="grid-item">
                            <div class="card" style="width:135px;">
                            <a href="{{ url('admin/auth/user') }}" style="text-decoration: none;">
                                <div class="card-body">
                                <div class="text-muted text-center">
                                    <i class="c-sidebar-nav-icon fas fa-users-cog"></i>
                                </div>
                                <div class="text-center mb-0">Acccess User</div>
                                <div class="progress progress-xs mt-2 mb-0" style="height:2px;">
                                    <div class="progress-bar bg-{{ @$colors[$color++] }}" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                </div>
                            </a>
                            </div>
                        </div>

                        <div class="grid-item">
                            <div class="card" style="width:135px;">
                            <a href="{{ url('admin/auth/role') }}" style="text-decoration: none;">
                                <div class="card-body">
                                <div class="text-muted text-center">
                                    <i class="c-sidebar-nav-icon fas fa-users-cog"></i>
                                </div>
                                <div class="text-center mb-0">Acccess Role</div>
                                <div class="progress progress-xs mt-2 mb-0" style="height:2px;">
                                    <div class="progress-bar bg-{{ @$colors[$color++] }}" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    @endif

                        @foreach(Module::getOrdered() as $module)
                        @if($module->isEnabled())
                            <?php
                                $module = $module->getLowerName();
                                $route = 'admin.'.$module.'.index';
                                $active = 'admin/'.$module.'*';
                                $mod_trans = $module.'::menus.backend.sidebar.'.$module;
                            ?>
                            @can('admin.access.'.$module.'.view')
                                <!-- ./col -->
                                <div class="grid-item">
                                    <div class="card" style="width:135px;">
                                    <a href="{{ route($route) }}" style="text-decoration: none;">
                                        <div class="card-body">
                                        <div class="text-muted text-center">
                                            <i class="{{ config($module.'.icon') }}"></i>
                                        </div>
                                        @if($module == 'client')
                                            <div class="text-center mb-0">Merchant</div>
                                        @else
                                            <div class="text-center mb-0">{{ ucfirst($module) }}</div>
                                        @endif
                                        <div class="progress progress-xs mt-2 mb-0" style="height:2px;">
                                            <div class="progress-bar bg-{{ @$colors[$color++] }}" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        </div>
                                    </a>
                                    </div>
                                </div>
                                <!-- ./col -->
                            @endcan
                        @endif
                        @if($color == 6)
                        <?php
                            $color = 0;
                        ?>
                        @endif
                        @endforeach
                    </div><!--row-->
                  @if(!auth()->user()->isVendor())
                    <div class="row">
                      <div class="col-md-6">
                        <div class="card">
                          <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                              <h3 class="card-title">Sales(Last 7 days)</h3>
                              {{-- <a href="javascript:void(0);">View Report</a> --}}
                            </div>
                          </div>
                          <div class="card-body">
                            {{-- <div class="d-flex">
                              <p class="d-flex flex-column">
                                <span class="text-bold text-lg">$18,230.00</span>
                                <span>Sales Over Time</span>
                              </p>
                              <p class="ml-auto d-flex flex-column text-right">
                                <span class="text-success">
                                  <i class="fas fa-arrow-up"></i> 33.1%
                                </span>
                                <span class="text-muted">Since last month</span>
                              </p>
                            </div> --}}
                            <!-- /.d-flex -->

                            <div class="position-relative mb-4">
                              <canvas id="sales-chart" height="300"></canvas>
                            </div>

                            {{-- <div class="d-flex flex-row justify-content-end">
                              <span class="mr-2">
                                <i class="fas fa-square text-primary"></i> This year
                              </span>

                              <span>
                                <i class="fas fa-square text-gray"></i> Last year
                              </span>
                            </div> --}}
                          </div>
                        </div>
                        <!-- /.card -->
                                <!-- <div class="card">
                          <div class="card-header border-0">
                            <h3 class="card-title">Products</h3>
                            <div class="card-tools">
                              <a href="#" class="btn btn-tool btn-sm">
                                <i class="fas fa-download"></i>
                              </a>
                              <a href="#" class="btn btn-tool btn-sm">
                                <i class="fas fa-bars"></i>
                              </a>
                            </div>
                          </div>
                          <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                              <thead>
                              <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Sales</th>
                                <th>More</th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                <td>
                                  <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                                  Some Product
                                </td>
                                <td>$13 USD</td>
                                <td>
                                  <small class="text-success mr-1">
                                    <i class="fas fa-arrow-up"></i>
                                    12%
                                  </small>
                                  12,000 Sold
                                </td>
                                <td>
                                  <a href="#" class="text-muted">
                                    <i class="fas fa-search"></i>
                                  </a>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                                  Another Product
                                </td>
                                <td>$29 USD</td>
                                <td>
                                  <small class="text-warning mr-1">
                                    <i class="fas fa-arrow-down"></i>
                                    0.5%
                                  </small>
                                  123,234 Sold
                                </td>
                                <td>
                                  <a href="#" class="text-muted">
                                    <i class="fas fa-search"></i>
                                  </a>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                                  Amazing Product
                                </td>
                                <td>$1,230 USD</td>
                                <td>
                                  <small class="text-danger mr-1">
                                    <i class="fas fa-arrow-down"></i>
                                    3%
                                  </small>
                                  198 Sold
                                </td>
                                <td>
                                  <a href="#" class="text-muted">
                                    <i class="fas fa-search"></i>
                                  </a>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <img src="{{ url('assets/plugins/backend/dist/img/default-150x150.png') }}" alt="Product 1" class="img-circle img-size-32 mr-2">
                                  Perfect Item
                                  <span class="badge bg-danger">NEW</span>
                                </td>
                                <td>$199 USD</td>
                                <td>
                                  <small class="text-success mr-1">
                                    <i class="fas fa-arrow-up"></i>
                                    63%
                                  </small>
                                  87 Sold
                                </td>
                                <td>
                                  <a href="#" class="text-muted">
                                    <i class="fas fa-search"></i>
                                  </a>
                                </td>
                              </tr>
                              </tbody>
                            </table>
                          </div>
                        </div> -->
                      </div>
                      <div class="col-md-6">
                        <div class="card">
                          <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                              <h3 class="card-title">Top Products(Last 7 days)</h3>
                              {{-- <a href="javascript:void(0);">View Report</a> --}}
                            </div>
                          </div>
                          <div class="card-body">
                            {{-- <div class="d-flex">
                              <p class="d-flex flex-column">
                                <span class="text-bold text-lg">820</span>
                                <span>Visitors Over Time</span>
                              </p>
                              <p class="ml-auto d-flex flex-column text-right">
                                <span class="text-success">
                                  <i class="fas fa-arrow-up"></i> 12.5%
                                </span>
                                <span class="text-muted">Since last week</span>
                              </p>
                            </div> --}}
                            <!-- /.d-flex -->

                            <div class="position-relative mb-4">
                              <canvas id="product-chart" height="300"></canvas>
                            </div>

                            {{-- <div class="d-flex flex-row justify-content-end">
                              <span class="mr-2">
                                <i class="fas fa-square text-primary"></i> This Week
                              </span>

                              <span>
                                <i class="fas fa-square text-gray"></i> Last Week
                              </span>
                            </div> --}}
                          </div>
                        </div><!-- /.card -->
                      </div> <!-- col-md end -->
                    </div>
                  @endif
            	</div>
            </div>


        </x-slot>
    </x-backend.card>
@endsection
@push('after-scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  $(function () {
    'use strict'

    var ticksStyle = {
      fontColor: '#495057',
      fontStyle: 'bold'
    }

    var mode = 'index'
    var intersect = true

    var $saleChart = $('#sales-chart')
    var saleChart = new Chart($saleChart, {
      type: 'bar',
      data: {
        labels: ['2023-04-19', '2023-04-18', '2023-04-17', '2023-04-16', '2023-04-15', '2023-04-14', '2023-04-13'],
        datasets: [
          {
            label: 'Ecormmance Sale',
            backgroundColor: 'red',
            borderColor: '#007bff',
            data: [1000, 2000, 3000, 2500, 2700, 2500, 3000]
          },
          {
            label: 'Walk In Sale',
            backgroundColor: 'green',
            borderColor: '#ced4da',
            data: [700, 1700, 2700, 2000, 1800, 1500, 2000]
          }
        ]
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          mode: mode,
          intersect: intersect
        },
        hover: {
          mode: mode,
          intersect: intersect
        },
        legend: {
          display: false
        },
        scales: {
          y: {
            // display: false,
            gridLines: {
              display: true,
              lineWidth: '4px',
              color: 'rgba(0, 0, 0, .2)',
              zeroLineColor: 'transparent'
            },
            ticks: $.extend({
              beginAtZero: true,
              callback: function (value) {
                if (value >= 1000) {
                  value /= 1000
                  value += 'k'
                }

                return '$' + value
              }
            }, ticksStyle)
          },
          x: {
            display: true,
            gridLines: {
              display: false
            },
            ticks: ticksStyle
          }
        }
      }
    })

    var $productsChart = $('#product-chart')
    var productsChart = new Chart($productsChart, {
      type: 'doughnut',
      data: {
        labels: [
            'Gas Cooker',
            'Cartridge',
            'Stove',
            'Pressure',
            'Gas Lighter',
            'Cylinder'
        ],
        datasets: [{
            data: [2112, 2343, 2545, 3423, 2365, 1985],
            backgroundColor: [
                'rgba(63, 81, 181, 0.5)',
                'rgba(77, 182, 172, 0.5)',
                'rgba(66, 133, 244, 0.5)',
                'rgba(156, 39, 176, 0.5)',
                'rgba(233, 30, 99, 0.5)',
                'rgba(66, 73, 244, 0.4)',
            ],
            hoverOffset: 4
        }]
      },
      options: {
        aspectRatio: 2.4,
    }
    })
  })

</script>
@endpush
