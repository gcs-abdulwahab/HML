<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.3/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div>

        <a href="{{ route('schools.create') }}" class="btn btn-primary">Create School</a>

        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Name</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Address
                    </th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($schools as $school)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $school->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $school->address }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">

                            <a href="{{ route('schools.edit', $school->id) }}" class="btn btn-primary">Edit</a>

                            |


                            <form id="delete-form-{{ $school->id }}"
                                action="{{ route('schools.destroy', $school->id) }}" method="POST"
                               >
                                <button class="btn btn-error">Delete me</button>
                                @csrf
                                @method('DELETE')
                            </form>


                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>



    </div>

</body>

</html>
