<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="p-12 mx-auto sm:px-6 lg:px-8 w-full grid grid-cols-5 gap-2 ">
        <div class="bg-white p-3 sm:rounded-lg">
            <ul class="list-non">
                <a href="">
                    <li class="hover:bg-gray-200 p-1 rounded-lg"><a href="{{ route('my.code.edit')}}">My Refrerral Code</a></li>
                </a>
                <li class="hover:bg-gray-200 p-1 rounded-lg" >My Team</li>
                <a href="">
                    <li class="hover:bg-gray-200 p-1 rounded-lg">Apply For Post</li>
                </a>
                <a href="">
                    <li class="hover:bg-gray-200 p-1 rounded-lg">Bank Details</li>
                </a>
            </ul>
        </div>
        <div class="col-span-4 p-3 bg-white sm:rounded-lg">
            <div class="pl-2 pb-2">
                <Input type="checkbox">

            </div>
            <table class="table-auto w-full border-collapse border">
                <tbody>
                    <tr class="border hover:bg-gray-100 ">
                        <td class="p-2"><Input type="checkbox"></td>
                        <td class="p-2">Account Confirmation State Bank...</td>
                        <td class="p-2">Re: Es gibt neues zu Ihre Anfrage [#12556] bei dem GLS Support - Anfrage
                            Kontaktformular...</td>
                        <td class="p-2">11:01 am</td>
                    </tr>
                    <tr class=" border hover:bg-gray-100 ">
                        <td class="p-2"><Input type="checkbox"></td>
                        <td class="p-2">Bank Statment</td>
                        <td class="p-2">vielen Dank, dass Sie sich als Händler bei Solar Hook</td>
                        <td class="p-2">03:52 pm</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>
