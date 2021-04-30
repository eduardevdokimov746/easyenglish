<div class="block-filters" style="margin: 0 auto">
    <ul class="list-filter">
        <li>
            <a class="item-list-filter {{ $activePavItem == 'courses' ? 'active-item-list-filter' : ''}}" href="{{ route('web_teacher_courses_index') }}">
                Курсы
            </a>
        </li>
        <li>
            <a class="item-list-filter {{ $activePavItem == 'zadanies' ? 'active-item-list-filter' : ''}}" href="{{ route('web_teacher_courses_zadanies') }}">
                Задания
            </a>
        </li>
        <li>
            <a class="item-list-filter {{ $activePavItem == 'groups' ? 'active-item-list-filter' : ''}}" href="{{ route('web_teacher_groups_index') }}">
                Группы
            </a>
        </li>
        <li>
            <a class="item-list-filter {{ $activePavItem == 'materials' ? 'active-item-list-filter' : ''}}" href="{{ route('web_teacher_materials_index') }}">
                Материалы
            </a>
        </li>
    </ul>
</div>
