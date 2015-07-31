@extends('layouts.master')

@section('main')
    <div style="min-height: 100%; height: 100%;" data-course-lists>
        <div class="row" style="position: relative; top: 50%; transform: translateY(-50%)">
            <div class="col s2 offset-s5">
                <div class="preloader-wrapper big active">
                    <div class="spinner-layer spinner-blue-only">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="position: fixed; top: 1em; right: 1em;">
        <a href="{{ route('signOut') }}" class="waves-effect waves-light btn"><i class="material-icons" title="登出">input</i></a>
    </div>

    <div id="course-news-modal" class="modal">
        <div class="modal-content">
            <h4 data-modal-heading>公告</h4>

            <div data-course-news></div>

            <div class="row" data-loading style="margin-top: 3em;">
                <div class="col s4 offset-s4 m4 offset-m5">
                    <div class="preloader-wrapper big active">
                        <div class="spinner-layer spinner-blue-only">
                            <div class="circle-clipper left">
                                <div class="circle"></div>
                            </div>
                            <div class="gap-patch">
                                <div class="circle"></div>
                            </div>
                            <div class="circle-clipper right">
                                <div class="circle"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        (function($)
        {
            $(function()
            {
                $(document).on('click', '.modal-trigger[data-course-id]', function()
                {
                    var courseID = $(this).data('course-id');

                    $('h4[data-modal-heading]').text($(this).closest('li').find('p.title').text());

                    insertHtmlContent($('div[data-course-news]'), courseID, '/course-news/' + $(this).data('course-id'), function() {$('div[data-loading]').hide();});
                });

                insertHtmlContent($('div[data-course-lists]'), 'course-lists', '/course-lists');
            });
        })(jQuery);
    </script>
@endsection