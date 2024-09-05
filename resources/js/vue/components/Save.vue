<template>
    <div>
        <o-field label="Titulo">
            <o-input value=""></o-input>
        </o-field>
        <o-field label="Descripcion">
            <o-input type="textarea" value=""></o-input>
        </o-field>
        <o-field label="Categoria">
            <o-select placeholder="Seleccione una categoria">
                <option value="">Cate 1</option>
            </o-select>
        </o-field>
        <o-field label="Posted">
            <o-select placeholder="Seleccione un estado">
                <option value="yes">Si</option>
                <option value="not">No</option>
            </o-select>
        </o-field>
        <o-button variant="primary">Enviar</o-button>
    </div>
</template>