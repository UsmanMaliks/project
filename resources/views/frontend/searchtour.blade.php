<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="/search/css/main.css" rel="stylesheet" />
</head>

<body>
    <div class="s003">
        <form method="POST" action="{{ route('search.result') }}">
            @csrf
            <div class="inner-form" >
                <div class="input-field first-wrap">
                    <div class="input-select">
                        <select data-trigger="" name="city_from" >
                            <option disabled selected >City From</option>
                            @foreach ($citydata as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="input-field first-wrap">
                    <div class="input-select">
                        <select data-trigger="" name="city_to">
                            <option disabled selected>City To</option>
                            @foreach ($citydata as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="input-field sibi-wrap">
                    <input class="datepicker" id="depart" name="from_date" type="date" placeholder="29 Aug 2022" />
                </div>
                <div class="input-field sibi-wrap">
                    <input class="datepicker" id="return" name="to_date" type="date" placeholder="30 Aug 2022" />
                </div>
                <div class="input-field third-wrap" style="width: 200px">
                    <button class="btn-search" type="submit">
                        <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas"
                            data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor"
                                d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
            <div style="margin: 3rem; margin-left: 25rem;" >
                <a href="/" style="font-size: 20px; color:white;" >Go Back</a>
            </div>
        </form>
    </div>
    <script src="search/js/extention/choices.js"></script>
    <script>
        const choices = new Choices('[data-trigger]', {
            searchEnabled: true,
            itemSelectText: '',
        });
    </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
