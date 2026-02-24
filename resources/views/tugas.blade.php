<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rating Book</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

<div class="max-w-5xl mx-auto p-6">

    <h1 class="text-3xl text-center font-bold mb-6 text-gray-800">
        Rating Book
    </h1>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-lg rounded-2xl p-6 mb-6">

        <h3 class="text-lg font-semibold mb-3 text-center">
            {{ $book->title }}
        </h3>

        <p><strong>Author:</strong> {{ $book->author }}</p>
        <p><strong>Publisher:</strong> {{ $book->publisher }}</p>

        <p class="mt-3"><strong>Description:</strong></p>
        <p class="text-gray-600 mb-4">{{ $book->description }}</p>

        {{-- AVERAGE RATING (NUMERIC ONLY) --}}
        <p class="font-semibold mb-4">
            Average Rating:
            <span class="text-yellow-500 text-lg">
                @if($book->average_rating)
                    {{ $book->average_rating }} / 5
                @else
                    No rating
                @endif
            </span>
        </p>

        {{-- FORM ADD RATING --}}
        <form action="{{ route('storeRating', $book->id) }}" method="POST">
            @csrf

            <label class="block mb-2 font-medium">Give Rating</label>

            <select name="rating"
                class="w-full border rounded-lg px-3 py-2 mb-3">
                <option value="">Select Rating</option>
                <option value="5">⭐⭐⭐⭐⭐</option>
                <option value="4">⭐⭐⭐⭐</option>
                <option value="3">⭐⭐⭐</option>
                <option value="2">⭐⭐</option>
                <option value="1">⭐</option>
            </select>

            <div class="flex gap-2">
                <button type="submit"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg">
                    Submit Rating
                </button>

                <a href="/"
                    class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded-lg">
                    Back
                </a>
            </div>
        </form>

    </div>

    {{-- RATING HISTORY --}}
    <div class="bg-white shadow-lg rounded-2xl p-6">

        <h2 class="text-xl font-bold mb-4 text-gray-700 text-center">
            Rating History
        </h2>

        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-100 text-gray-600 text-sm uppercase">
                    <th class="p-3">No</th>
                    <th class="p-3">Rating</th>
                    <th class="p-3 text-center">Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">

                @forelse($book->ratings as $index => $rating)
                <tr class="border-t">
                    <td class="p-3">{{ $index + 1 }}</td>

                    <td class="p-3 text-yellow-500 text-lg">
                        @for($i = 1; $i <= $rating->rating; $i++)
                            ⭐
                        @endfor
                    </td>

                    <td class="p-3 flex gap-2 justify-center">

                        {{-- UPDATE --}}
                        <form action="{{ route('updateRating', $rating->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <select name="rating"
                                class="border rounded px-2 py-1 text-sm">
                                <option value="5" {{ $rating->rating == 5 ? 'selected' : '' }}>⭐⭐⭐⭐⭐</option>
                                <option value="4" {{ $rating->rating == 4 ? 'selected' : '' }}>⭐⭐⭐⭐</option>
                                <option value="3" {{ $rating->rating == 3 ? 'selected' : '' }}>⭐⭐⭐</option>
                                <option value="2" {{ $rating->rating == 2 ? 'selected' : '' }}>⭐⭐</option>
                                <option value="1" {{ $rating->rating == 1 ? 'selected' : '' }}>⭐</option>
                            </select>

                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded text-sm">
                                Update
                            </button>
                        </form>

                        {{-- DELETE --}}
                        <form action="{{ route('deleteRating', $rating->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                onclick="return confirm('Delete this rating?')"
                                class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded text-sm">
                                Delete
                            </button>
                        </form>

                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="4" class="text-center p-4 text-gray-400">
                        No ratings yet
                    </td>
                </tr>
                @endforelse

            </tbody>
        </table>

    </div>

</div>

</body>
</html>