@extends('employee.layouts')

@section('content')
    <!-- Breadcomb area Start-->
    <div class="breadcomb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcomb-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcomb-wp">
                                    <div class="breadcomb-icon">
                                        <i class="notika-icon notika-mail"></i>
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <h2>Inbox</h2>
                                        <p>Welcome to your inbox</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                                <div class="breadcomb-report">
                                    <button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn">
                                        <i class="notika-icon notika-sent"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcomb area End-->

    <!-- Inbox area Start-->
    <div class="inbox-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="inbox-left-sd">
                        <div class="compose-ml">
                            <a class="btn" href="#">Compose</a>
                        </div>
                        <div class="inbox-status">
                            <ul class="inbox-st-nav inbox-ft">
                                <li>
                                    <a href="#"><i class="notika-icon notika-mail"></i> Inbox
                                        <span>{{ $notificationsCount }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="inbox-text-list sm-res-mg-t-30">
                        {{-- <div class="form-group">
                            <div class="nk-int-st search-input search-overt">
                                <input type="text" class="form-control" placeholder="Search email..." />
                                <button class="btn search-ib">Search</button>
                            </div>
                        </div> --}}
                        <div class="inbox-btn-st-ls btn-toolbar">
                            <div class="btn-group ib-btn-gp active-hook nk-email-inbox">
                                <button class="btn btn-default btn-sm"><i class="notika-icon notika-refresh"></i> Refresh</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-inbox">
                                <tbody>
                                    <tr class="{{ $notification->is_read ? '' : 'unread' }}">
                                        <td>
                                            <label>
                                                <input type="checkbox" class="i-checks" {{ $notification->is_read ? 'checked' : '' }}>
                                            </label>
                                        </td>
                                        <td>
                                            <strong>Admin:</strong> {{ $notification->created_by_user->name ?? 'System' }}
                                        </td>
                                        <td>
                                            <strong>Employee:</strong> {{ Str::limit($notification->message, 50) }}
                                        </td>
                                        <td>
                                            <strong>Leader:</strong> {{ $notification->leader->name ?? 'System' }}
                                        </td>
                                        <td>
                                            @if($notification->attachment)
                                                <i class="notika-icon notika-paperclip" title="Attachment"></i>
                                            @endif
                                        </td>
                                        <td class="text-right mail-date">
                                            {{ $notification->created_at->format('D, M d') }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Inbox area End-->
@endsection
