<div class="modal fade show" id="eventRates" aria-labelledby="eventRates" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-simple modal-sm modal-sidebar">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Manage Rates</h4>
            </div>

            <div class="modal-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th class="text-nowrap">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($event->ticketTypes as $rate)
                            <tr>
                                <td>{{ $rate->name }}</td>
                                <td>{{ $rate->price }}</td>
                                <td class="text-nowrap">
                                    <a href="#" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Edit">
                                        <i class="icon wb-wrench" aria-hidden="true"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Delete">
                                        <i class="icon wb-close" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <h4 class="modal-title">Add New Rate</h4>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-block">Save changes</button>
                <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>