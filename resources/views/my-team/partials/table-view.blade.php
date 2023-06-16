<section class="space-y-6">
    <table class="table-auto w-full text-lg">
        <thead>
            <tr class="bg-gray-100 ">
                <td>Name</td>
                <td>Post</td>
                <td>Address</td>
                <td>Joining Date</td>
                <td>Right/Left</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
                <tr class="hover:bg-gray-200 p-2">
                    <td>{{ $member->referred_users->name }}</td>
                    <td>{{ $member->referred_users->user_detail->post ?? 'Not Active Yet' }}</td>
                    <td>{{ $member->referred_users->user_detail->address ?? 'NA' }}</td>
                    <td>{{ $member->created_at }}</td>

                    <td>{{ $member->gender }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</section>
