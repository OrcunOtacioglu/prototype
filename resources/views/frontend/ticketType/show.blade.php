<div class="modal fade" id="tickets" tabindex="-1" role="dialog" aria-labelledby="ticketsLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="ticketsLabel">Choose Your Ticket</h4>
            </div>

            <div class="modal-body">
                @foreach($event->ticketTypes as $ticketType)
                    <div class="row">
                        <div class="col-md-3">
                            <p>{{ $ticketType->name }}</p>
                        </div>
                        <div class="col-md-3">
                            <p>{{ $ticketType->price }}</p>
                        </div>
                        <form action="{{ action('CartController@addItem') }}" method="POST">
                            <div class="col-md-3">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{ $ticketType->id }}" name="ticket">
                                <select name="quantity" id="quantity" class="form-control">
                                    @for($i = $ticketType->min_allowed_per_purchase; $i <= $ticketType->max_allowed_per_purchase; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input type="submit" class="btn btn-block btn-success" value="Add">
                            </div>
                        </form>
                    </div>
                    <hr>
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>