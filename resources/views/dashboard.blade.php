<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('YooMail') }}
        </h2>
    </x-slot>


    <div class="p-12 mx-auto sm:px-6 lg:px-8 w-full grid grid-cols-5 gap-2 ">
        <div class="bg-white p-3 sm:rounded-lg">
          <ul class="list-non">
            <a href=""><li class="hover:bg-gray-200 p-1 rounded-lg">Inbox</li></a>
            <li class="hover:bg-gray-200 p-1 rounded-lg" id="composeButton">Compose</li>
            <a href=""><li class="hover:bg-gray-200 p-1 rounded-lg">Draft</li></a>
            <a href=""><li class="hover:bg-gray-200 p-1 rounded-lg">Trash</li></a>
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

//Composer
<div id="composeModal" class="fixed inset-0 flex items-center justify-center z-10 hidden">

        <div class="bg-white p-6 rounded-lg shadow-lg w-2/4">
            <div class="flex items-center">

                <div class="ml-4">
                    <h2 class="text-lg font-semibold text-gray-900">Compose Email</h2>
                    <p class="text-sm text-gray-500">From: <span class="font-medium">{{auth()->user()->new_email}}</span></p>
                </div>
            </div>
            <div class="mt-6">
                <input type="text" class="w-full bg-gray-100  text-gray-900 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="To">
            </div>
            <div class="mt-4">
                <input type="text" class="w-full bg-gray-100  text-gray-900  rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Subject">
            </div>
            <div class="mt-4">
                <textarea class="w-full bg-gray-100  text-gray-900  rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Message" rows="6"></textarea>
            </div>
            <div class="mt-6 flex justify-end">
                <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Send</button>
            </div>
        </div>



</div>

<script>
    // Open the pop-up/modal when the "Compose" button is clicked
document.getElementById('composeButton').addEventListener('click', function() {
    document.getElementById('composeModal').classList.remove('hidden');
});

// Close the pop-up/modal when the user clicks outside of it
document.addEventListener('click', function(event) {
    if (event.target.id === 'composeModal') {
        document.getElementById('composeModal').classList.add('hidden');
    }
});

</script>
