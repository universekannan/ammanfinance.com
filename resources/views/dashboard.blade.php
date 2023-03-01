@extends('layout')
@section('content')
<div class="content-wrapper">
   <section class="content">
      <div class="col-12">
   @if(auth()->user()->user_types_id == 1)
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-lg-3 col-6">
<div class="small-box bg-info">
<div class="inner">
<h3>{{ $Customers }}</h3>
<p>Gold Loans Customers</p>
</div>
<div class="icon">
<i class="ion ion-bag"></i>
</div>
<a href="customers" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">
<div class="small-box bg-success">
<div class="inner">
<h3>{{ $Activations }}</h3>
<p>Activations Gold Loans</p>
</div>
<div class="icon">
<i class="ion ion-stats-bars"></i>
</div>
<a href="activations" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">
<div class="small-box bg-danger">
<div class="inner">
<h3>{{ $TotalGoldLoans }}</h3>
<p>Total Gold Loans</p>
</div>
<div class="icon">
<i class="ion ion-pie-graph"></i>
</div>
<a href="activations" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">
<div class="small-box bg-danger">
<div class="inner">
<h3>{{ $GoldLoansRemind }}</h3>
<p>Gold Loans Remind</p>
</div>
<div class="icon">
<i class="ion ion-pie-graph"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>
<div class="col-lg-3 col-6">
<div class="small-box bg-info">
<div class="inner">
<h3>{{ $InvestmentCustomers }}</h3>
<p>Deposit Customers</p>
</div>
<div class="icon">
<i class="ion ion-bag"></i>
</div>
<a href="depositscustomers" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">
<div class="small-box bg-success">
<div class="inner">
<h3>{{ $InvestmentActivations }}</h3>
<p>Activations Deposit</p>
</div>
<div class="icon">
<i class="ion ion-stats-bars"></i>
</div>
<a href="activations" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">
<div class="small-box bg-danger">
<div class="inner">
<h3>{{ $TotaInvestment }}</h3>
<p>Total Deposit</p>
</div>
<div class="icon">
<i class="ion ion-pie-graph"></i>
</div>
<a href="activations" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">
<div class="small-box bg-danger">
<div class="inner">
<h3>{{ $InvestmentRemind }}</h3>
<p>Deposit Remind</p>
</div>
<div class="icon">
<i class="ion ion-pie-graph"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">
<div class="small-box bg-danger">
<div class="inner">
   @if($todaygold == "")
<h3>0</h3>
@else
<h3>{{ $todaygold }}</h3>
@endif
<p>New Gold Loans</p>
</div>
<div class="icon">
<i class="ion ion-pie-graph"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">
<div class="small-box bg-danger">
<div class="inner">
   @if($todaydeposits == "")
<h3>0</h3>
@else
<h3>{{ $todaydeposits }}</h3>
@endif
<p>New Deposits</p>
</div>
<div class="icon">
<i class="ion ion-pie-graph"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>


<div class="col-lg-3 col-6">
<div class="small-box bg-warning">
<div class="inner">
<h3>{{ $Users }}</h3>
<p>Users</p>
</div>
<div class="icon">
<i class="ion ion-person-add"></i>
</div>
<a href="users" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

</div>
</section>
@elseif(auth()->user()->user_types_id == 2)
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-lg-3 col-6">
<div class="small-box bg-info">
<div class="inner">
<h3>o</h3>
<p>OP Patients</p>
</div>
<div class="icon">
<i class="ion ion-bag"></i>
</div>
<a href="patients" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-success">
<div class="inner">
<h3>o</h3>
<p>IP Patients</p>
</div>
<div class="icon">
<i class="ion ion-stats-bars"></i>
</div>
<a href="patients" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-warning">
<div class="inner">
<h3>o</h3>
<p>Users</p>
</div>
<div class="icon">
<i class="ion ion-person-add"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-danger">
<div class="inner">
<h3>o</h3>
<p>Remind</p>
</div>
<div class="icon">
<i class="ion ion-pie-graph"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>
</div>
</section>
@elseif(auth()->user()->user_types_id == 3)
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-lg-3 col-6">
<div class="small-box bg-info">
<div class="inner">
<h3>o</h3>
<p>OP Patients</p>
</div>
<div class="icon">
<i class="ion ion-bag"></i>
</div>
<a href="patients" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-success">
<div class="inner">
<h3>o</h3>
<p>IP Patients</p>
</div>
<div class="icon">
<i class="ion ion-stats-bars"></i>
</div>
<a href="patients" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-warning">
<div class="inner">
<h3>o</h3>
<p>Users</p>
</div>
<div class="icon">
<i class="ion ion-person-add"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-danger">
<div class="inner">
<h3>o</h3>
<p>Remind</p>
</div>
<div class="icon">
<i class="ion ion-pie-graph"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>
</div>
</section>
@elseif(auth()->user()->user_types_id == 4)
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-lg-3 col-6">
<div class="small-box bg-info">
<div class="inner">
<h3>o</h3>
<p>OP Patients</p>
</div>
<div class="icon">
<i class="ion ion-bag"></i>
</div>
<a href="patients" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-success">
<div class="inner">
<h3>o</h3>
<p>IP Patients</p>
</div>
<div class="icon">
<i class="ion ion-stats-bars"></i>
</div>
<a href="patients" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-warning">
<div class="inner">
<h3>o</h3>
<p>Users</p>
</div>
<div class="icon">
<i class="ion ion-person-add"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-danger">
<div class="inner">
<h3>o</h3>
<p>Remind</p>
</div>
<div class="icon">
<i class="ion ion-pie-graph"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>
</div>
</section>
@elseif(auth()->user()->user_types_id == 5)
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-lg-3 col-6">
<div class="small-box bg-info">
<div class="inner">
<h3>o</h3>
<p>OP Patients</p>
</div>
<div class="icon">
<i class="ion ion-bag"></i>
</div>
<a href="patients" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-success">
<div class="inner">
<h3>o</h3>
<p>IP Patients</p>
</div>
<div class="icon">
<i class="ion ion-stats-bars"></i>
</div>
<a href="patients" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-warning">
<div class="inner">
<h3>o</h3>
<p>Users</p>
</div>
<div class="icon">
<i class="ion ion-person-add"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-danger">
<div class="inner">
<h3>o</h3>
<p>Remind</p>
</div>
<div class="icon">
<i class="ion ion-pie-graph"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>
</div>
</section>
@endif
      </div>
</div>
</div>
</div>
</div>
</section>
<!-- /.content -->
</div>
@endsection
