<button class="btn btn-primary my-4 d-block" data-toggle="collapse" data-target="#{{ $id }}_report">Show Records</button>
<div id="{{ $id }}_report" class="collapse table-responsive">
    <table class="table table-hover table-sm">
        <thead>
        <tr>
            <th>Action</th>
            <th>Date</th>
            <th>Item</th>
            <th>Description</th>
            <th>Amount (NGN)</th>
        </tr>
        </thead>
        <tbody>
        @forelse($records as $expense)
            <tr>
                <td>
                    <a href="{{ route('expenses.edit', $expense->hashed_id) }}" class="text-info" data-toggle="tooltip" data-placement="top" title="Edit">
                        <i class="far fa-edit"></i>
                    </a>
                    <a href="javascript:void(0)" onclick="deleteItem(`{{ $expense->hashed_id }}`)" class="text-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
                <td>{{ $expense->date->format('Y-m-d') }}</td>
                <td>{{ $expense->item }}</td>
                <td>{{ $expense->description ?? '--' }}</td>
                <td>{{ number_format($expense->amount) }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5">You are yet to add a record.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
