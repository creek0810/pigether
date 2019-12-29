const POST_API = {
    "getPost": "http://140.121.197.197:6778/pigether/api/getPost",
    "getOwner": "http://140.121.197.197:6778/pigether/api/getOwnerByPostId"
};
/* ----Change the modal into edit style */
function editPost() {
    const postFields = {
        'show-post-id': 'edit-post-id',
        'show-post-title': 'edit-post-title',
        'show-post-course': 'edit-post-course',
        'show-post-team-ability': 'edit-post-team-ability'
    };

    /* set the post info of edit post modal  */
    Object.keys(postFields).forEach((element) => {
        let data = (document.getElementById(element).innerHTML).replace(/\s+/g, '');
        data = data.replace(/<br>/g, "\r\n");
        document.getElementById(postFields[element]).value = data;
    });

    $("#show-post-modal").modal("hide");
    $("#edit-post-modal").modal("show");
}

/* ----show the target post---- */
async function showPost(id) {
    const account = document.getElementById(`post_owner_account${id}`).innerHTML;
    const owner = await FetchData.getData(`${POST_API.getOwner}?account=${account}`);

    const current_user = document.getElementById('current_user_name').innerHTML;
    const postFields = {
        'post_id': 'show-post-id',
        'post_title': 'show-post-title',
        'post_update_time': 'show-post-update-time',
        'post_course': 'show-post-course',
        'post_team_ability': 'show-post-team-ability'
    };
    const postOwnerFields = {
        'name': 'user-name',
        'phone': 'user-phone',
        'email': 'user-email',
        'line_id': 'user-line',
        'propic': 'user-propic'
    };

    /* set the post info of show post modal  */
    Object.keys(postFields).forEach((element) => {
        tarElement = element + id;
        document.getElementById(postFields[element]).innerHTML = document.getElementById(tarElement).innerHTML;
    });
    /* set the post owner info of show post modal  */
    Object.keys(postOwnerFields).forEach((element) => {
        if (element === 'propic') {
            if (owner[0][element]) {
                document.getElementById(postOwnerFields[element]).src = `data:image/jpeg;base64,${owner[0][element]}`;
            } else {
                document.getElementById(postOwnerFields[element]).src = "https://images-na.ssl-images-amazon.com/images/I/51t3T95HZ%2BL._SX466_.jpg";
            }
        } else if (element === 'name') {
            document.getElementById(postOwnerFields[element]).innerHTML = `發起人: ${owner[0][element]}`;
            //change the edit button state
            if (current_user === owner[0][element]) {
                document.getElementById('edit').classList.remove('hidden');
            } else {
                document.getElementById('edit').classList.add('hidden');
            }
        } else {
            document.getElementById(postOwnerFields[element]).setAttribute("data-content",
                (owner[0][element]) ? owner[0][element] : "");
        }
    });

    $("#show-post-modal").modal("show");
}

/* ----search the post title---- */
function searchByTitle(posts) {
    const search_content = document.getElementById('post-search-content').value;
    if (search_content !== "") {
        posts.forEach(i => {
            const titleContent = document.getElementById(`post_title${i.id}`).innerHTML;
            const post = document.getElementById(`post${i.id}`);
            if (titleContent.includes(search_content)) {
                post.classList.remove('hidden');
            } else {
                post.classList.add('hidden');
            }
        });
    }
}

/* ----Check user sign in or can't post---- */
function sendPost() {
    const current_user = document.getElementById('current_user_name').innerHTML;
    if (current_user === '未登入') {
        $("#hint-post-modal").modal("show");
        $("#new-post-modal").modal("hide");
    } else {
        $("#hint-post-modal").modal("hide");
        $("#new-post-modal").modal("show");
    }
}

/* ----Change the edit form action for edit or delete----- */
function setEditFormAction(btn) {
    let editForm = document.getElementById('edif-form');

    if (btn === 'save') {
        editForm.action = editForm.action.replace("deletePost", "editPost");
    } else if (btn === 'delete') {
        editForm.action = editForm.action.replace("editPost", "deletePost");
    }
    editForm.submit();
}


async function init() {
    const posts = await FetchData.getData(POST_API.getPost);
    /* ----listener for view post */
    posts.forEach(post => {
            document.getElementById(`post${post.id}`).addEventListener("click", function() { showPost(post.id) });
        })
        /* ----listener for update post */
    document.getElementById('delete').addEventListener('click', function() { setEditFormAction('delete') });
    document.getElementById('save').addEventListener('click', function() { setEditFormAction('save') });
    document.getElementById('edit').addEventListener('click', editPost);

    /* ----listener for insert post---- */
    document.getElementById('post-btn').addEventListener('click', sendPost);

    /* ----listener for post search---- */
    document.getElementById('post-search-content').addEventListener('keypress',
        (event) => {
            if (event.key === "Enter") {
                searchByTitle(posts);
                event.preventDefault();
            }
        });
    document.getElementById('post-search').addEventListener('click', function() { searchByTitle(posts) });

}

window.addEventListener('load', init);
