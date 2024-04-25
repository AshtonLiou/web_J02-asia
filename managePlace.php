<div class="container text-center mt-5">
    <h1>Manage Places</h1>
    <table class="table table-striped table-bordered table-hover table-light mt-5">
        <thead class="text-white" style="background: var(--green);">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in data.data"
                :class="{ 'table-danger': item.chDel, 'confdelAnimation': item.confdelAnimation }">
                <td style="width: 5vw;">{{ item.id }}</td>
                <td class="text-left" style="width: 30vw;">{{ item.title }}</td>
                <td class="actionTd">
                    <button class="btn rootBtn m-1" @click="editRecord(item.id)" v-if="!item.chDel" style="width: 8em;">EDIT</button>
                    <button class="btn dangerBtn m-1" @click="confDel(item.id)" v-else style="width: 8em;">CONFDEL</button>
                    <button class="btn dangerBtn m-1" @click="delRecord(item.id)" v-if="!item.chDel" style="width: 8em;">DELETE</button>
                    <button class="btn rootBtn m-1" @click="unDel(item.id)" v-else style="width: 8em;">UNDEL</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>