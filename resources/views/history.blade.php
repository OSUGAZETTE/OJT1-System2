@extends('layouts.app')

@section('title')
  <title>OSU | ADMIN DOCUMENT HISTORY</title>
@endsection

@section('a3')
  class="active"
@endsection

@section('content')
<div class="content-inner">
  <section class="forms py-0">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card my-3">
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">History </h3>
            </div>
            <table class="table table-striped mb-0">
                <thead>
                  <tr>
                    <th class="text-center" style="vertical-align: middle;width: 25%">Action</th>
                    <th class="text-center" style="vertical-align: middle;width: 50%">Filen Name</th>
                    <th class="text-center" style="vertical-align: middle;width: 25%">Timestamp</th>
                  </tr>
                </thead>
            </table>
            <div class="card-body p-2" style="height: calc(100vh - 265px);overflow: auto;">
              <table class="table table-striped">
                <tbody>
                  @foreach($histories as $history)
                  <tr>
                    <td class="p-2" style="vertical-align: middle;width: 25%">
                      <p class="mb-0 py-auto text-center"><?php echo $history->Action ?></p>
                    </td>
                    <td class="p-2" style="vertical-align: middle; width:50%">
                      <p class="mb-0 py-auto text-center"><?php echo $history->File_Name ?></p>
                    </td>
                    <td class="p-2" style="vertical-align: middle; width:25%">
                      <p class="mb-0 py-auto text-center"><?php echo date('F j, Y h:i a', strtotime($history->TimeStamp)); ?></p>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            {{ $histories->links() }}
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection