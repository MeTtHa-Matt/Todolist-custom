module.exports = {
    proxy: "localhost/todolist",
    files: ["**/*.php", "**/*.css", "**/*.js"],
    notify: false,
    snippetOptions: {
        rule: {
            match: /<\/head>/i,
            fn: (snippet) => snippet
        }
    }
};