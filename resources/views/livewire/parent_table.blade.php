
<button class="btn btn-success  btn-lg pull-right" wire:click="show_add_form" type="button">{{ trans('Parent_trans.add_parent') }}</button><br><br><br><br>
<div class="table-responsive">
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
           style="text-align: center">
        <thead>
        <tr class="table-success">
            <th>#</th>
            <th>{{ trans('Parent_trans.Email') }}</th>
            <th>{{ trans('Parent_trans.Name_Father') }}</th>
            <th>{{ trans('Parent_trans.National_ID_Father') }}</th>
            <th>{{ trans('Parent_trans.Passport_ID_Father') }}</th>
            <th>{{ trans('Parent_trans.Phone_Father') }}</th>
            <th>{{ trans('Parent_trans.Job_Father') }}</th>
            <th>{{ trans('Parent_trans.Processes') }}</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 0; ?>
        @foreach ($parents as $my_parent)
            <tr>
                <?php $i++; ?>
                <td>{{ $i }}</td>
                <td>{{ $my_parent->Email }}</td>
                <td>{{ $my_parent->Father_Name }}</td>
                <td>{{ $my_parent->Father_National_ID }}</td>
                <td>{{ $my_parent->Father_Passport_ID }}</td>
                <td>{{ $my_parent->Father_Phone }}</td>
                <td>{{ $my_parent->Father_Job }}</td>
                <td>
                    <button wire:click="edit({{ $my_parent->id }})" title="{{ trans('Grades_trans.Edit') }}"
                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $my_parent->id }})" title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        @endforeach
    </table>
</div>