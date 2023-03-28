package fr.epita.assistants.data.model;

import javax.persistence.*;
import javax.persistence.Id;

@Entity @Table(name="student_model")
public class StudentModel {
    @Id
    @GeneratedValue
    public Long id;
    public String name;
    @ManyToOne
    @JoinColumn(name = "course_id")
    private CourseModel course;
}