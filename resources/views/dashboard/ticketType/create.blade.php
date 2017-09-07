<div class="modal fade" id="ticketType" tabindex="-1" role="dialog" aria-labelledby="ticketTypeLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="ticketTypeLabel">Create New Rate</h4>
            </div>
            <form action="{{ action('TicketTypeController@store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="hidden" name="accountID" value="{{ Auth::user()->account->id }}">
                    <input type="hidden" name="eventID" value="{{ $event->id }}">

                    <div class="form-group">
                        <label for="name">Rate Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="description">Rate Description</label>
                        <textarea name="description" id="description" cols="30" rows="3" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="price">Rate Price</label>
                        <input type="text" name="price" id="price" class="form-control">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="minAllowed">Min Allowed</label>
                                <select name="minAllowed" id="minAllowed" class="form-control">
                                    @for($i = 1; $i <= 10; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="maxAllowed">Max Allowed</label>
                                <select name="maxAllowed" id="maxAllowed" class="form-control">
                                    @for($i = 5; $i <= 20; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="text" name="quantity" id="quantity" class="form-control">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="rateStartDate">Rate Start Date</label>
                                <div class="input-group">
                                    <input type="text" name="rateStartDate" id="rateStartDate" class="form-control">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="rateEndDate">Rate End Date</label>
                                <div class="input-group">
                                    <input type="text" name="rateEndDate" id="rateEndDate" class="form-control">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="absorb">Absorb Fees</label>
                        <select name="absorb" id="absorb" class="form-control">
                            <option value="0">NO</option>
                            <option value="1">YES</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="CREATE">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>