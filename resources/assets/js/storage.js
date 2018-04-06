var storageType;

function hasStorage() {
    return (typeof(Storage) !== "undefined");
}

function get(name) {
    return storageType[name];
}

function set(name, value) {
    storageType[name] = value;
}

function remove(name) {
    storageType.removeItem(name);
}

function init(useSession) {
    if (!hasStorage()) {
        throw "Storage not supported.";
    }
    storageType = (useSession) ? sessionStorage : localStorage;

    return {
        get       : get,
        set       : set,
        remove    : remove,
        hasStorage: hasStorage
    };
}

module.exports = {
    init: init
};
