@extends('layouts.master')
@section('after_style')
<link rel="stylesheet" type="text/css" href="styles/blog_styles.css">
<link rel="stylesheet" type="text/css" href="styles/blog_responsive.css">
<style>
    .nav-tabs {
  display: none;
}

@media (min-width: 768px) {
  .nav-tabs {
    display: flex;
    flex-flow: column nowrap;
  }
  .nav-tabs {
    border-bottom: none;
    border-right: 1px solid #ddd;
    display: flex;
  }
  .nav-tabs {
    margin: 0 15px;
  }
  .nav-tabs .nav-item + .nav-item {
    margin-top: 0.25rem;
  }
  .nav-tabs .nav-link {
    transition: border-color 0.125s ease-in;
    white-space: nowrap;
  }
  .nav-tabs .nav-link:hover {
    background-color: #f7f7f7;
    border-color: transparent;
  }
  .nav-tabs .nav-link.active {
    border-bottom-color: #ddd;
    border-right-color: #fff;
    border-bottom-left-radius: 0.25rem;
    border-top-right-radius: 0;
    margin-right: -1px;
  }
  .nav-tabs .nav-link.active:hover {
    background-color: #fff;
    border-color: #0275d8 #fff #0275d8 #0275d8;
  }

  #content {
      width:75%;
  }
  .card {
    border: none;
  }

  .card .card-header {
    display: block;
    width : 100%;
  }

  .card .collapse {
    display: block;
  }
}
#exTab3 .nav-pills > li > a {
  border-radius: 4px 4px 0 0 ;
}

#exTab3 .tab-content {
  border-color: #428bca;
  border-style : solid;
  border-width:1px;
  min-height : 250px;
  padding : 5px 15px;
}
ul.nav.nav-pills {
    padding-left: 0;
    margin-bottom: 0;
    list-style: none;
}

ul.nav-pills > li {
    float: left;
    position: relative;
    display: block;
}
ul.nav-pills>li+li {
    margin-left: 2px;
}

ul.nav-pills > li.active >a {
    border-color: #428bca;
    border-width:1px;
    border-bottom: none;
}
ul.nav-pills > li.active {
    border-color: #428bca;
    border-width:1px;
    border-style:solid;
    border-bottom: none;
}

ul.nav-pills > li > a {
    position: relative;
    display: block;
    padding: 10px 15px;
}

@media (max-width: 767px) {
  .tab-pane {
    display: block !important;
    opacity: 1;
  }
}

</style>
@endsection
@section('content')
	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/blog_background.jpg"></div>
		<div class="home_content">
			<div class="home_title" style="font-size:50px">Account Information</div>
		</div>
	</div>

	<!-- Blog -->

	<div class="blog">
    <div class="container d-flex">
        <ul id="tabs" class="nav nav-tabs" role="tablist">
        <h3>
            <i class="fa fa-camera-retro fa-lg" style="width: 100px;
            height: 100px;
            line-height: 100px;
            border: 2px solid #eee;
            cursor: pointer;
            text-align:center;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
            -moz-transition: background-color 0.3s ease;
            -o-transition: background-color 0.3s ease;
            -webkit-transition: background-color 0.3s ease;
            transition: background-color 0.3s ease;"></i><br>
            {{ $user->full_name }}
        </h3>
            <li class="nav-item">
                <a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab" role="tab"> My Booking </a>
            </li>
            <li class="nav-item">
                <a id="tab-B" href="#pane-B" class="nav-link" data-toggle="tab" role="tab"> My Orders </a>
            </li>
            <li class="nav-item">
                <a id="tab-C" href="#pane-C" class="nav-link" data-toggle="tab" role="tab"> My Addresses </a>
            </li>
            <li class="nav-item">
                <a id="tab-D" href="#pane-D" class="nav-link" data-toggle="tab" role="tab"> My Wallet </a>
            </li>
            <li class="nav-item">
                <a id="tab-E" href="#pane-E" class="nav-link" data-toggle="tab" role="tab"> My Account </a>
            </li>
        </ul>

        <div id="content" class="tab-content" role="tablist">
        <div id="pane-A" class="card tab-pane fade show active" role="tabpanel" aria-labelledby="tab-A">
            <div class="card-header" role="tab" id="heading-A">
                <h4 class="mb-0"><b>Manage Your Bookings</b></h4>
                <h5 class="mb-0" style="padding:10px 5px">
                    View, reschedule or cancel your bookings and easily book again.
                </h5>
            </div>
            <div id="collapse-A" class="collapse show" role="tabpanel" aria-labelledby="heading-A">
            <div class="card-body">
            <div id="exTab3" class="container">	
                <ul class="nav nav-pills">
                    <li class="active">
                        <a  href="#1b" data-toggle="tab">Upcoming</a>
                    </li>
                    <li><a href="#2b" data-toggle="tab">History</a>
                    </li>
                </ul>

                <div class="tab-content clearfix">
                    <div class="tab-pane active" id="1b">
                        <div class="col-md-12" style="margin-top:120px;text-align:center">
                            You've got nothing booked at the moment.

                        </div>
                    </div>
                    <div class="tab-pane" id="2b">
                        <h3>We use the class nav-pills instead of nav-tabs which automatically creates a background color for the tab</h3>
                    </div>
                    <div class="tab-pane" id="3b">
                        <h3>We applied clearfix to the tab-content to rid of the gap between the tab and the content</h3>
                    </div>
                    <div class="tab-pane" id="4b">
                        <h3>We use css to change the background color of the content to be equal to the tab</h3>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </div>

        <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
            <div class="card-header" role="tab" id="heading-A">
                <h4 class="mb-0"><b>My Orders</b></h4>
                <h5 class="mb-0" style="padding:10px 5px">
                Check the status of orders, or browse through your past purchases.
                </h5>
            </div>
            <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
            <div class="card-body">
            You haven't placed any orders yet.
            </div>
            </div>
        </div>

        <div id="pane-C" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-C">
            <div class="card-header" role="tab" id="heading-A">
                <h4 class="mb-0"><b>My Addresses</b></h4>
                <h5 class="mb-0" style="padding:10px 5px">
                Add and manage the addresses you use often.
                </h5>
            </div>
            <div id="collapse-C" class="collapse" role="tabpanel" aria-labelledby="heading-C">
                <div class="card-body">
                You haven't saved any addresses yet.
                    <button type="button" style="
                    height: 42px;
                    color: #FFFFFF;
                    font: normal normal normal 15px/1.4em wfont_9a50cb_56f5f0b3dd0848459d9c3b0b6572137f,wf_56f5f0b3dd0848459d9c3b0b6,orig_circularstdmedium;
                    text-decoration: ;
                    padding: 0 20px;
                    border-radius: 0px;
                    border: 0px solid #ED6658;
                    background-color: #ED6658;
                    min-width: 184px;">Add New Address</button>
                </div>
            </div>
        </div>
        <div id="pane-D" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-D">
            <div class="card-header" role="tab" id="heading-A">
                <h4 class="mb-0"><b>My Wallet</b></h4>
                <h5 class="mb-0" style="padding:10px 5px">
                Save your credit and debit card details so you can checkout faster.
                </h5>
            </div>
            <div id="collapse-C" class="collapse" role="tabpanel" aria-labelledby="heading-C">
                <div class="card-body">
                You Haven’t Saved Any Cards Yet
                </div>
            </div>
        </div>
        </div>

        </div>
	</div>

	<!-- Footer -->
@endsection
@section('after_script')
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/contact_custom.js"></script>
@endsection