@extends('templates.base')

@section('content')

<div class="container mx-auto p-6">
    <div class="flex items-center justify-between">
        <h1 class="text-5xl font-bold text-gray-800">Products</h1>
        <div class="flex items-center">
            <form hx-get="/api/products"
                  hx-target="#products-list"
                  hx-trigger="submit"
                  class="flex items-center">
                <input type="text"
                       name="filter"
                       class="p-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                       placeholder="Search products">
            </form>
            <button id="openModalBtn" class="btn bg-indigo-500 text-white px-6 py-2 ml-3 rounded-lg hover:bg-indigo-600 transition duration-300">Add Product</button>
        </div>
    </div>
    <hr class="my-4 border-gray-300">
    <div id="products-list" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6" hx-get="/api/products" hx-trigger="load" hx-swap="innerHTML"></div>

    <div id="myModal" class="modal fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="modal-content bg-white p-6 rounded-lg shadow-lg w-full max-w-md" hx-get="/open" hx-trigger="load" hx-swap="innerHTML">

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        document.getElementById("openModalBtn").addEventListener('click', function() {
            var modal = document.getElementById("myModal");
            modal.classList.remove("hidden");
        });

    });

    function closeModal() {
        var modal = document.querySelector('.modal');
        if (modal) {
            modal.classList.add('hidden');
        }
        var inputs = document.querySelectorAll('#modalForm input');
        inputs.forEach(function(input) {
            input.value = '';
        });
        var message = document.getElementById('success');
        if (message) {
            message.style.display = 'none';
        }
    }
</script>

@endsection
