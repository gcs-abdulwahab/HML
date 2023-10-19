<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.3/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div>




        <form action="{{ route('schools.store') }}" method="POST">
            @csrf

            School Name : <input type="text" name="name" value="asd" placeholder="Enter Value" />
            <br>
            School address : <input type="text" name="address" value="dsa" placeholder="Enter Value" />

            <br>

            <button class="btn btn-primary">create</button>

        </form>




    </div>

</body>

</html>
