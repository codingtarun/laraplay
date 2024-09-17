<!-- Search Modal-->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="searchModalLabel">Search {{$modal}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('user.index')}}" method="GET" id="searchForm">
                    @csrf
                    <div class="mb-3" id="searchBox">
                        <input type="text" class="form-control" id="search" name="search" aria-describedby="searchHelp" placeholder="{{$modal}}">
                        <div id="autosuggest">

                        </div>
                        <div id="searchHelp" class="form-text">Enter User Name or Email Id to search.</div>
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Styling for Search box-->

<style>
    #searchBox {
        position: relative;
    }

    #autosuggest {
        position: absolute;
        width: 100%;
        opacity: .9;
    }
</style>

<!--Ajax Script for autosuggest-->

<script>
    $(document).ready(function() {
        // Auto Suggest functionaltiy
        $('#search').on("keyup", function() {
            var value = $(this).val();
            if ($(this).val() !== '') {
                $.ajax({
                    url: "{{route('user.autocomplete')}}",
                    type: "GET",
                    data: {
                        "search": value,
                    },
                    success: function(data) {
                        $('#autosuggest').html(data);
                        // Set Search input when an item from auto suggest list is clicked
                        $('.auto-suggest-list').on('click', function(event) {
                            event.preventDefault();
                            var linkText = $(this).text();
                            $('#search').val(linkText);
                            $('#autosuggest').html('');
                        });
                    }
                });
            } else {
                $('#autosuggest').html('');
            }
        });
    });
</script>