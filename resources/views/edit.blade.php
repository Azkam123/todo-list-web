<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Container -->
    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-xl shadow-lg">
        <!-- Title -->
        <h1 class="text-3xl font-bold text-center text-indigo-600 mb-6">Edit</h1>

        <!-- Input for new todo -->
        <form method="POST" action="{{ route('todo.update', ['todo' => $note]) }}">
            @method('PUT')
            @csrf
            <div class="flex mb-4">
                <input id="todo-input" type="text" name="note" value="{{ $note->note }}"
                    class="w-full py-2 px-4 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="Edit tugas..." required>
                <button type="submit" id="add-btn"
                    class="py-2 px-4 bg-indigo-600 text-white rounded-r-lg hover:bg-indigo-700 focus:outline-none">
                    Save
                </button>
            </div>
        </form>
    </div>
</body>

</html>
