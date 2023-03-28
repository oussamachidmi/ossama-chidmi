package fr.epita.assistants.data.model;

import javax.persistence.*;
import javax.persistence.Id;
import javax.persistence.Table;
import java.util.ArrayList;
import java.util.List;

@Entity @Table(name = "course_model")
public class CourseModel {
    @Id
    @GeneratedValue
    public Long id;
    public String name;
    @OneToMany(mappedBy = "course")
    private List<StudentModel> students = new ArrayList<>();
    @ElementCollection
    @CollectionTable(name = "course_model_tags", joinColumns = @JoinColumn(name = "course_id"))
    @Column(name = "tag")
    private List<String> tags = new ArrayList<>();

}