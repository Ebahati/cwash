<!DOCTYPE HTML>
<html>
<head>
    <title>CWMS | Contact Us Info</title>
    <!-- Include your CSS and JS here -->
</head>
<body>
   <div class="page-container">
       <!-- Header and sidebar include here -->
       <div class="left-content">
           <div class="mother-grid-inner">
               @include('includes.header')
               <div class="clearfix"></div>
           </div>

           <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a><i class="fa fa-angle-right"></i>Contact us information</li>
           </ol>

           <div class="grid-form">
               <div class="grid-form1">
                   <h3>Update Contact Information</h3>
                   @if ($errors->any())
                       <div class="errorWrap">
                           <strong>ERROR</strong>: {{ $errors->first() }}
                       </div>
                   @elseif (session('success'))
                       <div class="succWrap">
                           <strong>SUCCESS</strong>: {{ session('success') }}
                       </div>
                   @endif

                   <div class="panel-body">
                       <form method="POST" action="{{ route('contact.update') }}" class="form-horizontal">
                           @csrf

                           <div class="form-group">
                               <label for="address" class="col-sm-2 control-label">Address</label>
                               <div class="col-sm-8">
                                   <textarea class="form-control" name="address" id="address" placeholder="Address" required rows="4">{{ $contact->detail }}</textarea>
                               </div>
                           </div>

                           <div class="form-group">
                               <label for="openinghrs" class="col-sm-2 control-label">Opening Hours</label>
                               <div class="col-sm-8">
                                   <input type="text" class="form-control" name="openinghrs" id="openinghrs" placeholder="Opening Hour" value="{{ $contact->openignHrs }}" required>
                               </div>
                           </div>

                           <div class="form-group">
                               <label for="emailid" class="col-sm-2 control-label">Email Id</label>
                               <div class="col-sm-8">
                                   <input type="email" class="form-control" name="emailid" id="emailid" placeholder="Email Id" required value="{{ $contact->emailId }}">
                               </div>
                           </div>

                           <div class="form-group">
                               <label for="contactno" class="col-sm-2 control-label">Contact Number</label>
                               <div class="col-sm-8">
                                   <input type="text" class="form-control" name="contactno" id="contactno" placeholder="Contact Number" required value="{{ $contact->phoneNumber }}">
                               </div>
                           </div>

                           <div class="col-sm-8 col-sm-offset-2">
                               <button type="submit" class="btn-primary btn">Update</button>
                           </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!-- Include your JS scripts here -->
</body>
</html>
