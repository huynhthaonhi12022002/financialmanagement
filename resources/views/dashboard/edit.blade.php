@include('includes/header')
<body>
@include('includes/navbar')

<div class="container">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <h4 class="text-center">{{__('overview.accounts-form.update-title')}}</h4>
     
        <form class="simcy-form" action="{{ route('dashboard.update') }}" data-parsley-validate="" loader="true" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <p>{{sprintf(__('overview.accounts-form.update-intro'), $account->name)}}</p>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label>{{__('overview.accounts-form.label.name')}}</label>
                            <input type="text" class="form-control" value="{{$account->name}}" name="name" placeholder="{{__('overview.accounts-form.placeholder.name')}}">
                            <input type="hidden" name="csrf-token" value="{{csrf_token()}}" />
                            <input type="hidden" name="accountid" value="{{$account->id}}" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label>{{__('overview.accounts-form.label.balance')}}</label>
                            <span class="input-prefix">VND</span>
                            <input type="number" class="form-control prefix" value="{{$account->balance}}" step="0.01" data-parsley-pattern="^-?[0-9]*\.?[0-9]{0,2}$" name="balance" placeholder="{{__('overview.accounts-form.placeholder.balance')}}" required="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label>{{__('overview.accounts-form.label.type')}}</label>
                            <select class="form-control select2" name="type">
                                <option value="Cash" @if($account->type == 'Cash') selected @endif >
                                    {{__('overview.accounts-form.types.cash')}}</option>
                                <option value="Bank" @if($account->type == 'Bank') selected @endif >
                                    {{__('overview.accounts-form.types.bank')}}</option>
                                <option value="Card" @if($account->type == 'Card') selected @endif >
                                    {{__('overview.accounts-form.types.card')}}</option>
                                <option value="E-Wallet" @if($account->type == 'E-Wallet') selected @endif >
                                    {{__('overview.accounts-form.types.ewallet')}}</option>
                                <option value="Other" @if($account->type == 'Other') selected @endif >
                                    {{__('overview.accounts-form.types.other')}}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12 ">
                            <label>{{__('overview.accounts-form.label.status')}}</label>
                            <select class="form-control select2" name="status">
                                <option value="Active" @if($account->status == 'Active') selected @endif >
                                    {{__('overview.accounts-form.status.active')}}</option>
                                <option value="Inactive" @if($account->status == 'Inactive') selected @endif >
                                {{__('overview.accounts-form.status.inactive')}}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{__('overview.button.close')}}</button>
                <button type="submit" class="btn btn-primary">{{__('overview.button.save-account')}}</button>
            </div>
        </form>
    </div>
    <div class="col-md-2"></div>

  </div>
  @include('includes/footer')
</div>
