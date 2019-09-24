<div class="modal fade" id="profile-{{ $official->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mt-2">
                        <img src="{{$official->photo}}" height="200px" width="200px" alt="">
                    </div>
                    <div class="col-lg-8 mx-auto">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->

                            <h2 class="text-uppercase">{{ $official->name }}</h2>
                            <p class="item-intro text-muted">{{ $official->position->name }}</p>
                            <img class="img-fluid d-block mx-auto" src="img/portfolio/01-full.jpg" alt="">
                            <p>{{ $official->profile }}</p>
                            <ul class="list-inline">
                                <li>Date: January 2017</li>
                                <li>Client: Threads</li>
                                <li>Category: Illustration</li>
                            </ul>
                            <button class="btn btn-danger" data-dismiss="modal" type="button">
                                <i class="fas fa-times"></i>
                                Close Profile</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
