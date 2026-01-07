<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- Hero Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card-pro bg-gradient-primary-pro text-white p-4 shadow-lg-pro">
                <div class="row align-items-center justify-content-between">
                    <div class="col">
                        <h2 class="h3 font-weight-bold mb-1">Welcome back, Admin!</h2>
                        <p class="mb-0 text-white-50">Here's what's happening with your platform today.</p>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-chart-line fa-2x text-white-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- User Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card-pro h-100 py-2 border-left-primary">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="stat-card-title text-primary">Total Students</div>
                            <div class="stat-card-value"><?= $count_tk_a + $count_tk_b; ?></div>
                        </div>
                        <div class="col-auto">
                            <div class="stat-icon-bg bg-primary text-white rounded-circle shadow-sm">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- TK A Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card-pro h-100 py-2 border-left-success">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="stat-card-title text-success">Siswa TK A</div>
                            <div class="stat-card-value"><?= $count_tk_a; ?></div>
                        </div>
                        <div class="col-auto">
                            <div class="stat-icon-bg bg-success text-white rounded-circle shadow-sm">
                                <i class="fas fa-child"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- TK B Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card-pro h-100 py-2 border-left-info">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="stat-card-title text-info">Siswa TK B</div>
                            <div class="stat-card-value"><?= $count_tk_b; ?></div>
                        </div>
                        <div class="col-auto">
                            <div class="stat-icon-bg bg-info text-white rounded-circle shadow-sm">
                                <i class="fas fa-user-graduate"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Performance Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card-pro h-100 py-2 border-left-warning">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="stat-card-title text-warning">Progress (BSH/BSB)</div>
                            <div class="stat-card-value"><?= $count_high_performance; ?></div>
                        </div>
                        <div class="col-auto">
                            <div class="stat-icon-bg bg-warning text-white rounded-circle shadow-sm">
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</div>
