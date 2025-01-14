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
        <h1 class="text-3xl font-bold text-center text-indigo-600 mb-6">Todo List</h1>

        <!-- Input for new todo -->
        <form method="POST" action="{{ route('todo.store') }}">
            @csrf
            <div class="flex mb-4">
                <input id="todo-input" type="text" name="note"
                    class="w-full py-2 px-4 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="Tambahkan tugas baru..." required>
                <button type="submit" id="add-btn"
                    class="py-2 px-4 bg-indigo-600 text-white rounded-r-lg hover:bg-indigo-700 focus:outline-none">
                    Tambah
                </button>
            </div>
        </form>

        <!-- Todo List -->
        @foreach ($notes as $note)
            <ul id="todo-list" class="space-y-4">
                <!-- Example todo item -->
                <li class="flex items-center justify-between bg-gray-50 p-3 rounded-lg shadow">
                    <span class="text-gray-700">{{ $note->note }}</span>
                    <div class="flex items-center space-x-2">
                        <!-- Edit Button (Pencil Icon) -->
                        <a href="{{ route('todo.edit', ['todo' => $note->id]) }}"
                            class="text-yellow-500 hover:text-yellow-700 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 3l5 5-13 13H3v-5L16 3z"></path>
                            </svg>
                        </a>

                        <!-- Delete Button (Trash Icon) -->
                        <form action="{{ route('todo.destroy', ['todo' => $note]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="text-red-500 hover:text-red-700 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </li>
            </ul>
        @endforeach
    </div>
</body>

</html>
