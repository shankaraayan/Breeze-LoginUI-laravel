<section class="space-y-6">
    <table class="table-auto w-full text-lg">
        <thead>
            <tr class="bg-gray-100 ">
                <td>Name</td>
                <td>Bank</td>
                <td>Account No.</td>
                <td>IFSC</td>
                <td>Verification</td>
            </tr>
        </thead>
        <tbody>

                <tr class="hover:bg-gray-200 p-2">
                    <td>{{ $bankDetails->account_holder ?? 'NA' }}</td>
                    <td>{{ $bankDetails->bank_name ?? 'NA' }}</td>
                    <td>{{ $bankDetails->account_no ?? 'NA' }}</td>
                    <td>{{ $bankDetails->ifsc ?? 'NA' }}</td>
                    <td>{{ $bankDetails->status ?? 'NA' }}</td>
                </tr>

        </tbody>
    </table>
</section>
