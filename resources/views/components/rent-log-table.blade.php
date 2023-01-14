<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>User</th>
                <th>Book</th>
                <th>Rent Date</th>
                <th>Return Date</th>
                <th>Actual Return Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rentLogsData as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->users->username}}</td>
                <td>{{ $item->books->title}}</td>
                <td>{{ $item->rent_date }}</td>
                <td>{{ $item->return_date }}</td>
                <td>{{ $item->actual_return_date }}</td>
                <td>
                    @if(now('GMT+7')->toDateString() > $item->return_date )
                    <p class="text-danger">Terlambat Dikembalikan</p>
                    @elseif ($item->actual_return_date < $item->return_date)
                        <p class="text-warning">Belum Dikembalikan</p>
                        @elseif ($item->actual_return_date == $item->return_date)
                        <p class="text-success">Sudah Dikembalikan</p>
                        @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>