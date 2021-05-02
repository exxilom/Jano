/**
 * @author Francisco Javier González Sabariego
 */
{
    async function createPlataformsOptions(categoriesList){
        const fragment = new DocumentFragment();

        const subcategoryList = [...new Set(await categoriesList.map( e => e.subcategory))]

        subcategoryList.forEach( subcategory => {
            const optgroup = document.createElement("optgroup");
            optgroup.label = `${subcategory}`;
            categoriesList.filter( e => e.subcategory == subcategory )
            .forEach( e => {
                const option = document.createElement("option");
                option.value = `${e.name}`;
                //option.innerHTML = functions.normalizeOption(`${e.name}`);
                option.innerHTML = `${e.name}`;
                optgroup.appendChild(option);
            } );
            fragment.appendChild(optgroup);
        });

        return fragment;
    }

    async function getPlataformsList(formDOM,selectElement) {
        let path = "";
        const ROUTE = `${location.origin}/${(path = location.pathname.match(/^\/(\w+)(\/pages\/)?(\w+\.(html|php))?$/)?.[1]) == undefined ? "" : path}`;

        const data = new FormData(formDOM);

        const connect = await fetch(`${ROUTE}/api/platforms_list.php`, {
            method: 'POST',
            body: data
        });

        const subCategoriesList = await connect.json();

        selectElement.innerHTML = `<option value="">-- Choice an option --</option>`;
        selectElement.appendChild( await createPlataformsOptions(subCategoriesList) );
    }

    const init = () => {
        if (location.href.match(/accounts\.php\?add$/)?.input !== undefined) {
            const FORM = document.getElementById("form-add");
            const CATEGORIES = document.getElementById("categories");
            const SUBCATEGORIES = document.getElementById("subcategories");
            
            CATEGORIES.addEventListener("change", () => {
                if (CATEGORIES.value == "") {
                    SUBCATEGORIES.innerHTML = `<option value="">-- Choice an option --</option>`;
                    return;
                }
                getPlataformsList( FORM, SUBCATEGORIES );
            });
        }
        
    }

    document.addEventListener("DOMContentLoaded", init);
}